select 
    UPPER(u.last_name) as 'NAME',
    u.first_name,
    s.price 
FROM 
    user_card u,
    subscription s,
    `member` m
WHERE 
    m.id_user_card = u.id_user and 
    m.id_sub = s.id_sub and 
    s.price > 42 
order by last_name asc , first_name asc;