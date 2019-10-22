select
    last_name,
    first_name,
    date(birthdate) as `birthdate` 
from 
    user_card
where
    year(birthdate) = 1989
    ORDER BY last_name ASC;