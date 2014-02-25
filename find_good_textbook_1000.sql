DROP PROCEDURE IF EXISTS inventory.find_good_textbook_1000;
CREATE PROCEDURE inventory.`find_good_textbook_1000`()
    DETERMINISTIC
    COMMENT 'find from 1000 textbooks that produce profit'
BEGIN  
DECLARE param_ct int;
DECLARE param_ct_all int;
update pricehistory set aprice=null where aprice=1000;
update pricehistory set tnlprice=null where tnlprice=1000;
update pricehistory set tulprice=null where tulprice=1000;
update pricenewest set aprice=null where aprice=1000;
update pricenewest set tnlprice=null where tnlprice=1000;
update pricenewest set tulprice=null where tulprice=1000;

drop table textbook_avg;
create table textbook_avg
select p.`isbn` as isbn,avg(p.`aprice`) as avg_aprice,avg(p.`tnlprice`) as avg_tnlprice,
avg(p.`tulprice`) as avg_tulprice
 from `pricehistory` p where p.`flag`="T"
 group by p.`isbn`;

truncate table textbook_good_tmp;
insert into  `textbook_good_tmp` (isbn,aprice,avg_aprice) 
(select p.isbn as isbn,p.`aprice` as aprice,b.`avg_aprice` as avg_aprice from pricenewest p, textbook_avg b
where p.`isbn`=b.`isbn`
and b.`avg_aprice`*0.85- p.`aprice`>15.35 and p.aprice>0)
;
insert into  `textbook_good_tmp` (isbn,tnlprice,avg_tnlprice) 
(select p.isbn as isbn,p.`tnlprice` as tnlprice,b.`avg_tnlprice` as avg_tnlprice from pricenewest p, textbook_avg b
where p.`isbn`=b.`isbn`
and b.`avg_tnlprice`*0.85- p.`tnlprice`>15.35 and p.tnlprice>0)
;
select count(1) into param_ct from textbook_good;
select count(1) into param_ct_all from textbook where salesrank<500000;

if (param_ct>=param_ct_all-10) then
truncate table textbook_good;
end if;

insert into  `textbook_good_tmp` (isbn,tulprice,avg_tulprice) 
(select p.isbn as isbn,p.`tulprice` as tulprice,b.`avg_tulprice` as avg_tulprice from pricenewest p, textbook_avg b
where p.`isbn`=b.`isbn`
and b.`avg_tulprice`*0.85- p.`tulprice`>15.35 and p.tulprice>0)
;

insert into textbook_good(isbn,aprice,avg_aprice,tnlprice,avg_tnlprice,tulprice,avg_tulprice)
select isbn,sum(aprice),sum(avg_aprice),sum(tnlprice),sum(avg_tnlprice),sum(tulprice),sum(avg_tulprice)
from textbook_good_tmp
group by isbn;
END;

