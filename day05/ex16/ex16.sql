SELECT count(DISTINCT id_film) as movies
FROM `member_history`
WHERE (date(date) BETWEEN '2006-10-30' and '2007-07-27') or '12-24' = date_format(date,"%m-%d");