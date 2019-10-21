SELECT
	f.id_genre ,
	genre.name AS 'name_genre',
	f.id_distrib ,
	distrib.name AS 'name_distrib',
	f.title AS 'title_film'
FROM `film` f
left join `distrib` ON distrib.id_distrib = f.id_distrib
left join `genre` ON genre.id_genre = f.id_genre
WHERE f.id_genre BETWEEN 4 AND 8