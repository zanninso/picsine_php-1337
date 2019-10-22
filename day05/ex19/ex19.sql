select 
max(datediff(f.last_projection,date(m.date))) as uptime 
from film f, member_history m 
WHERE f.id_film = m.id_film 
GROUP BY f.id_film;