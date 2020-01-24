<?php

$galleries = include('./data/gallery.php');

/*
* @param int $id (id de la photo)
* @return array|false ( Renvoi la photo ayant l'id ou FALSE si cet identifiant est introuvable ) )
*/
function findOneById(int $id): ?array
{
	global $galleries;

	foreach ($galleries as $gallery) {
		if ($gallery['id'] === $id) {
			return $gallery;
		}
	}
	
	return NULL;
}
/*
* @return int (Renvoi le nombre de photos présente dans la base de données.)
*/
function getCount(): int
{
	global $galleries;
	return count($galleries);
}

/*
* @return array (Renvoi les [limit] photos, à partir de la photo [offset])
*/
function findPaged(int $limit, int $offset = 0): array
{
	global $galleries;
	return array_slice($galleries, $offset,$limit);
}

/*
* @return array (Renvoi les [limit] dernières photos (triées par date))
*/
function findLatest($limit): array {
    global $galleries;

    $i = 0;
    $result = [];
    foreach($galleries as $key => $value) {
        $date[$key] = $value['date'];
    }
    array_multisort($date, SORT_DESC, $galleries);
    foreach($galleries as $photo)
        if($i != $limit){
            $result[] = $photo;
            $i++;
        }
    return $result;
}

?>