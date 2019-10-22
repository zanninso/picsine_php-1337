SELECT 
title as `Title` ,
summary as `Summary`,
prod_year 
FROM 
    `film` f,
    `genre` g
WHERE
    g.id_genre = f.id_genre and
    g.name = 'erotic' 
ORDER BY prod_year DESC;