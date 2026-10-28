SELECT count(DISTINCT wykonane.nr_rejestracyjny) AS "w ilu samochodach" FROM wykonane
INNER JOIN uslugi USING(id_uslugi)
WHERE uslugi.usluga LIKE "wymiana oleju%";



SELECT count(*), wykonane.nr_rejestracyjny FROM wykonane
GROUP BY nr_rejestracyjny
ORDER BY COUNT(nr_rejestracyjny) DESC;