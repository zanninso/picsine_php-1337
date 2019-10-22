SELECT 
    floor_number as `floor` ,
    sum(nb_seats) as seats
from cinema 
group BY floor_number 
ORDER by seats DESC;