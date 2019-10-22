SELECT 
    last_name,
    first_name 
FROM 
    `user_card` 
WHERE
    last_name LIKE "%-%" or 
    first_name LIKE "%-%" 
order by last_name , first_name;