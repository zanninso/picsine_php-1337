select 
nom
from ditrub 
where id_distrib in (42,62,63,64,65,66,67,68,69,71,88,89,9) 
and (length(nom) - length(replace(nom, 'r', ''))) = 2 limit 3 , 5