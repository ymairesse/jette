<?php

setlocale(LC_TIME, 'fr_FR.UTF-8'); // Définit le local en français


class Planning
{

    public function __construct()
    {

    }

    /**
     * renvoie la date pivot de début d'un "contexte" $idContexte
     * 
     * @param int $idContexte
     * 
     * @return string
     */
    public function getDate4idContexte($idContexte)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT dateDebutContexte ';
        $sql .= 'FROM ' . PFX . 'contextes ';
        $sql .= 'WHERE idContexte = :idContexte ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idContexte', $idContexte, PDO::PARAM_STR, 100);

        $date = Null;
        $resultat = $requete->execute();
        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            $ligne = $requete->fetch();
            $date = $ligne['dateDebutContexte'];
        }

        Application::DeconnexionPDO($connexion);

        return $date;
    }


    /**
     * Renvoie la liste des contextes définis dans le planning
     * 
     * @return array
     * 
     */
    public function getListeContextes()
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT DISTINCT idContexte, dateDebutContexte ';
        $sql .= 'FROM ' . PFX . 'contextes ';
        $sql .= 'ORDER BY dateDebutContexte ';
        $requete = $connexion->prepare($sql);

        $liste = array();

        $resultat = $requete->execute();

        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()) {
                $idContexte = $ligne['idContexte'];
                $liste[$idContexte] = $ligne['dateDebutContexte'];
            }
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
    }

    /**
     * Construis une liste double des dates de début et de fin de chaque contexte
     * 
     * @param array $listeContextes
     * 
     * @return array
     */
    public function getListeDoubleContextes($listeContextes)
    {
        $listeDouble = array();

        // Récupérer les clés de $listeContextes
        $keys = array_keys($listeContextes);

        // Parcourir les clés jusqu'à l'avant-dernière clé
        // on n'a pas besoin de la dernière car cette période est ouverte
        $count = count($keys);
        for ($i = 0; $i < $count - 1; $i++) {
            // Obtenir la clé actuelle et la clé suivante
            $cleActuelle = $keys[$i];
            $cleSuivante = $keys[$i + 1];

            // Obtenir les dates correspondantes et formater chacune d'elles
            $dateActuelle = $listeContextes[$cleActuelle];
            // $date = explode('-', $dateActuelle);
            // $dateActuelle = sprintf('%s/%s/%s', $date[2], $date[1], $date[0]);

            $dateSuivante = $listeContextes[$cleSuivante];
            // $date = explode('-', $dateSuivante);
            // $dateSuivante = sprintf('%s/%s/%s', $date[2], $date[1], $date[0]);

            // Ajouter les dates à $listeDouble avec la clé d'origine
            $listeDouble[$cleActuelle] = array($dateActuelle, $dateSuivante);
        }

        // récupérer la date de début du contexte final
        $dateFinale = $listeContextes[end($keys)];

        // // formater la date finale
        // $date = explode('-', $dateFinale);
        // $dateFinale = sprintf('%s/%s/%s', $date[2], $date[1], $date[0]);
        // Ajouter la dernière date avec une marque représentant la fin
        $listeDouble[end($keys)] = array($dateFinale, '...');

        return $listeDouble;
    }

    /**
     * Trouver dans quel "contexte" défini dans le tableau $liste
     * se trouve une date donnée
     * 
     * @param string $date
     * 
     * @return int
     * 
     */
    public function getContexte4date($date)
    {
        $listeContextes = $this->getListeContextes();
        $listeDouble = $this->getListeDoubleContextes($listeContextes);

        // pas de date avant le commencement du monde
        if ($date < current($listeDouble)[0])
            return -1;

        // Parcourir le tableau $listeDates
        foreach ($listeDouble as $cle => $contexte) {
            $dateDebut = $contexte[0];
            $dateFin = $contexte[1];
            // Vérifier si la date recherchée est dans cet intervalle
            if ($date >= $dateDebut && $date < $dateFin) {
                break;
            }
        }

        // Si la date ne correspond à aucun intervalle, on est donc dans le dernier contexte
        if (!isset($cle)) {
            $cle = end($listeDouble);
        }

        return $cle;
    }

    /**
     * renvoie le nombre de périodes maximum du planning pour un mois donné
     * 
     * @param int $year
     * @param int $month
     * 
     * @return array
     */
    public function getMaxPeriodes4month($month, $year, $nbJoursMois){
        $dateDebutMois = sprintf('%d-%02d-01', $year, $month);
        $dateFinMois = sprintf('%d-%02d-%02d', $year, $month, $nbJoursMois);

        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT MAX(dateDebutContexte) AS limiteInf ';
        $sql .= 'FROM '.PFX.'contextes ';
        $sql .= 'WHERE dateDebutContexte <= :dateDebutMois ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':dateDebutMois', $dateDebutMois, PDO::PARAM_STR, 12);

        $resultat = $requete->execute();
        if ($resultat) {
            $ligne = $requete->fetch();
            $limiteInf = $ligne['limiteInf'];
        }


        $sql = 'SELECT MIN(dateDebutContexte) AS limiteSup ';
        $sql .= 'FROM '.PFX.'contextes ';
        $sql .= 'WHERE dateDebutContexte > :dateFinMois ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':dateFinMois', $dateFinMois, PDO::PARAM_STR, 12);

        $resultat = $requete->execute();
        if ($resultat) {
            $ligne = $requete->fetch();
            $limiteSup = $ligne['limiteSup'];
        }
        // echo "limiteSup ".$limiteSup;
        // die('limiteInf '.$limiteInf);

        $sql = 'SELECT idContexte FROM '.PFX.'contextes ';
        $sql .= 'WHERE ';
        if ($limiteInf != Null)
            $sql .= 'dateDebutContexte >= :limiteInf ';
        if (($limiteSup != Null) && ($limiteInf != Null))
            $sql .= 'AND ';
        if ($limiteSup != Null)
            $sql .= 'dateDebutContexte < :limiteSup ';

        $requete = $connexion->prepare($sql);

        if ($limiteInf != Null)
            $requete->bindParam(':limiteInf', $limiteInf, PDO::PARAM_STR, 12);
        if ($limiteSup != Null)
            $requete->bindParam(':limiteSup', $limiteSup, PDO::PARAM_STR, 12);

        $listeContextes = array();
        $resultat = $requete->execute();
        if ($resultat) {
            while ($ligne = $requete->fetch()) {
                $idContexte = $ligne['idContexte'];
                $listeContextes[] = $idContexte;
            }
        }

        $listeContextesString = implode(',', $listeContextes);

        $sql = 'SELECT idContexte, (count(numeroPermanence)) AS nbPermanences ';
        $sql .= 'FROM '.PFX.'heuresPermanences ';
        $sql .= 'WHERE idContexte IN ('.$listeContextesString.') ';
        $sql .= 'GROUP BY idContexte ';
        $requete = $connexion->prepare($sql);

        $resultat = $requete->execute();

        $listeMax = array();
        if ($resultat){
            while ($ligne = $requete->fetch()){
                $idContexte = $ligne['idContexte'];
                $listeMax[] = $ligne['nbPermanences'];
            }
        }

        $max = max($listeMax);

        Application::DeconnexionPDO($connexion);

        return $max;
    }

    /**
     * recherche la liste des périodes de permanences définies dans un $idContexte 
     * 
     * @param string $date
     * 
     * @return array
     */
    public function getPermanences4contexte($idContexte)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT contextes.idContexte, dateDebutContexte, numeroPermanence, heureDebut, heureFin ';
        $sql .= 'FROM ' . PFX . 'heuresPermanences AS heuresPermanences ';
        $sql .= 'JOIN ' . PFX . 'contextes AS contextes ON contextes.idContexte = heuresPermanences.idContexte ';
        $sql .= 'WHERE contextes.idContexte = :idContexte ';
        $sql .= 'ORDER BY numeroPermanence ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idContexte', $idContexte, PDO::PARAM_INT);

        $listePeriodes = array();
        $resultat = $requete->execute();

        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()) {
                $numeroPermanence = $ligne['numeroPermanence'];
                $listePeriodes[$numeroPermanence] = $ligne;
            }
        }

        Application::DeconnexionPDO($connexion);

        return $listePeriodes;
    }

    /**
     * retourne les détails de la permanence $numeroPermanence
     * du contexte $idContexte
     * 
     * @param int $idContexte
     * @param int $numeroPermanence
     * 
     * @return array
     */
    public function getPermanence($idContexte, $numeroPermanence)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT contextes.idContexte, dateDebutContexte, numeroPermanence, heureDebut, heureFin ';
        $sql .= 'FROM  ' . PFX . 'heuresPermanences  AS heuresPermanences ';
        $sql .= 'JOIN ' . PFX . 'contextes AS contextes ON heuresPermanences.idContexte = contextes.idContexte ';
        $sql .= 'WHERE  contextes.idContexte = :idContexte AND numeroPermanence = :numeroPermanence ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idContexte', $idContexte, PDO::PARAM_INT);
        $requete->bindParam(':numeroPermanence', $numeroPermanence, PDO::PARAM_INT);

        $dataPeriode = array();

        $resultat = $requete->execute();

        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            $dataPeriode = $requete->fetch();
        }

        Application::DeconnexionPDO($connexion);

        return $dataPeriode;
    }

    /**
     * Enregistre les caractéristiques d'une période de permanence $idContexte, $numeroPermanence
     * 
     * @param int $idContexte
     * @param int $numeroPermanence
     * @param string $heureDebut
     * @param string $heureFin
     */
    public function savePeriodePermanence($idContexte, $numeroPermanence, $heureDebut, $heureFin)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'INSERT INTO ' . PFX . 'heuresPermanences SET idContexte = :idContexte, ';
        $sql .= 'numeroPermanence = :numeroPermanence, heureDebut = :heureDebut, heureFin = :heureFin ';
        $sql .= 'ON DUPLICATE KEY UPDATE heureDebut = :heureDebut, heureFin = :heureFin ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idContexte', $idContexte, PDO::PARAM_INT);
        $requete->bindParam(':numeroPermanence', $numeroPermanence, PDO::PARAM_INT);
        $requete->bindParam(':heureDebut', $heureDebut, PDO::PARAM_STR, 5);
        $requete->bindParam(':heureFin', $heureFin, PDO::PARAM_STR, 5);

        $resultat = $requete->execute();

        $nb = 0;
        if ($resultat) {
            $nb = $requete->rowCount();
        }

        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * créer $nbPermanences avec des numéros commençant à $numeroPermanence + 1 pour la $idContexte
     * 
     * @param int $idContexte
     * @param int $nbPermanences nombre de permanences à créer
     * @param int $numeroPermanence plus grand numéro actuel de permanence
     * 
     * @return int
     */
    public function saveNewPermanences($idContexte, $nbPermanences, $numeroPermanence)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'INSERT INTO ' . PFX . 'heuresPermanences ';
        $sql .= 'SET idContexte = :idContexte, numeroPermanence = :numeroPermanence ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idContexte', $idContexte, PDO::PARAM_INT);
        $n = 0;
        while ($n < $nbPermanences) {
            $numeroPermanence++;
            $requete->bindParam(':numeroPermanence', $numeroPermanence, PDO::PARAM_INT);
            $resultat = $requete->execute();
            $n++;
        }

        Application::DeconnexionPDO($connexion);

        return $n;
    }

    /**
     * Supprimer la permanence $numeroPermanence du contexte $idContexte
     * 
     * @param int $numeroPermanence
     * @param int $idContexte
     * 
     * @return int
     */
    public function delPermanence($idContexte, $numeroPermanence)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'DELETE FROM ' . PFX . 'heuresPermanences ';
        $sql .= 'WHERE idContexte = :idContexte AND numeroPermanence = :numeroPermanence ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':numeroPermanence', $numeroPermanence, PDO::PARAM_INT);
        $requete->bindParam(':idContexte', $idContexte, PDO::PARAM_INT);

        $resultat = $requete->execute();

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * Supprimer le contexte $idContexte (y compris les périodes de permanences liées)
     * 
     * @param int $idContexte
     * 
     * @return int
     */
    public function delContexte($idContexte){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'DELETE FROM '.PFX.'contextes ';
        $sql .= 'WHERE idContexte = :idContexte ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idContexte', $idContexte, PDO::PARAM_INT);

        $resultat = $requete->execute();

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * Enregistre la date pivot d'un nouveau contexte $dateDebutContexte
     * 
     * @param string $dateDebutContexte
     * 
     * @return int
     */
    public function saveDateContexte($dateDebutContexte)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'INSERT INTO ' . PFX . 'contextes ';
        $sql .= 'SET dateDebutContexte = :dateDebutContexte ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':dateDebutContexte', $dateDebutContexte, PDO::PARAM_STR, 12);

        $resultat = $requete->execute();

        $nb = 0;

        $id = $connexion->lastInsertId();

        if ($resultat) {
            $nb = $requete->rowCount();
        }

        Application::DeconnexionPDO($connexion);

        return $id;
    }

    /**
     * Enregistre une nouvelle date pivot pour un contexte après modification
     * 
     * @param int $idContexte
     * @param string $dateDebutContexte
     * 
     * @return int
     */
    public function saveNewDate4Contexte($idContexte, $dateDebutContexte){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'UPDATE '.PFX.'contextes ';
        $sql .= 'SET dateDebutContexte = :dateDebutContexte ';
        $sql .= 'WHERE idContexte = :idContexte ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idContexte', $idContexte, PDO::PARAM_INT);
        $requete->bindParam(':dateDebutContexte', $dateDebutContexte, PDO::PARAM_STR, 12);

        $resultat = $requete->execute();

        $nb = 0;
        if ($resultat) {
            $nb = $requete->rowCount();
        }

        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * Récupère la liste des périodes journalières pour le contexte $idContexte
     * 
     * @return array
     */
    public function getPeriodes4contexte($idContexte)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT idContexte, numeroPermanence, heureDebut, heureFin ';
        $sql .= 'FROM ' . PFX . 'heuresPermanences ';
        $sql .= 'WHERE idContexte = :idContexte ';
        $sql .= 'ORDER BY heureDebut ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idContexte', $idContexte, PDO::PARAM_INT);

        $liste = array();
        $resultat = $requete->execute();
        $requete->setFetchMode(PDO::FETCH_ASSOC);
        while ($ligne = $requete->fetch()) {
            $numeroPermanence = $ligne['numeroPermanence'];
            $liste[$numeroPermanence] = $ligne;
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
    }

    /**
     * jour de la semaine en français depuis le numéro du jour (1 à 7)
     * 
     * @param int $numJour
     * 
     * @return string
     */
    public function getNomJour($numJour)
    {
        $semaine = array(
            1 => 'Lundi',
            2 => 'Mardi',
            3 => 'Mercredi',
            4 => 'Jeudi',
            5 => 'Vendredi',
            6 => 'Samedi',
            7 => 'Dimanche'
        );
        return $semaine[$numJour];
    }

     /**
     * renvoie le nom du mois en français depuis le numéro du mois
     * 
     * @param int $month
     * 
     * @return string
     */
    public function monthName ($month){
        $listeMois = [
            '01' => 'Janvier', 
            '02' => 'Février', 
            '03' => 'Mars', 
            '04' => 'Avril', 
            '05' => 'Mai', 
            '06' => 'Juin', 
            '07' => 'Juillet', 
            '08' => 'Août', 
            '09' => 'Septembre', 
            '10' => 'Octobre', 
            '11' => 'Novembre', 
            '12' => 'Décembre'];

        return $listeMois[$month];
    }

    /**
     * Constitue la grille des périodes de permanence du mois $month de l'année $year
     * 
     * @param int $year
     * @param int month
     * 
     * @return array
     */
    public function getMonthGrid($month, $year)
    {
        // À quel contexte correspond la date du début de mois?
        $dateFirstOfMonth = sprintf('%d-%02d-01', $year, $month);

        // quel est le numéro du dernier jour du mois?
        $lastDay4month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $dateLastOfMonth = sprintf('%d-%02d-%02d', $year, $month, $lastDay4month);

        // création du tableau des jours
        $grid = array();

        for ($jour = 1; $jour <= $lastDay4month; $jour++) {
            $grid[$jour] = array();
            // combien de périodes pour ce jour?
            $laDate = sprintf('%d-%02d-%02d', $year, $month, $jour);

            $listeContextes = $this->getListeContextes();
            $idContexte = $this->getContexte4date($laDate);

            $listePeriodesActuelles = $this->getPermanences4contexte($idContexte);
            $nbPeriodes = count($listePeriodesActuelles);

            $noJourSemaine = date("N", strtotime($laDate));

            $grid[$jour]['noJourSemaine'] = $noJourSemaine;

            $nom_jour_fr = $this->getNomJour($noJourSemaine);
            $grid[$jour]['nomDuJour'] = $nom_jour_fr;
            $grid[$jour]['date'] = $laDate;
            $grid[$jour]['idContexte'] = $idContexte;

            // chaque période est initialisée
            for ($periode = 1; $periode <= $nbPeriodes; $periode++) {
                $dataPeriode = $listePeriodesActuelles[$periode];
                $data = array(
                    'heureDebut' => $dataPeriode['heureDebut'],
                    'heureFin' => $dataPeriode['heureFin'],
                );
                $grid[$jour]['periodes'][$periode] = $data;
            }
        }

        return $grid;
    }

    /**
     * Supprime la permanence prévue du bénévole $pseudo à la date $date
     * pour la période $periode
     * 
     * @param string $pseudo
     * @param string $date
     * @param int periode
     * 
     * @return int
     */
    public function deletePeriode($date, $periode, $pseudo)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'DELETE FROM ' . PFX . 'calendar ';
        $sql .= 'WHERE date = :date AND periode = :periode AND pseudo = :pseudo ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':date', $date, PDO::PARAM_STR, 10);
        $requete->bindParam(':periode', $periode, PDO::PARAM_INT);
        $requete->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 7);

        $resultat = $requete->execute();

        $nb = $requete->rowCount();

        Application::deconnexionPDO($connexion);

        return $nb;

    }

    /**
     * Ajoute une inscription pour la permanence $periode ($numérique) à la date $date (YYYY-mm-dd)
     * pour l'utilisateur $pseudo dans le contexte $idContexte
     * 
     * @param int $idContexte
     * @param string $date
     * @param int $periode
     * @param string $pseudo
     * 
     * @return int
     */
    public function addPeriode($idContexte, $date, $periode, $pseudo)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'INSERT IGNORE INTO ' . PFX . 'calendar ';
        $sql .= 'SET idContexte = :idContexte, date = :date, periode = :periode, pseudo = :pseudo ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idContexte', $idContexte, PDO::PARAM_INT);
        $requete->bindParam(':date', $date, PDO::PARAM_STR, 10);
        $requete->bindParam(':periode', $periode, PDO::PARAM_INT);
        $requete->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 7);

        $resultat = $requete->execute();

        $nb = $requete->rowCount();

        Application::deconnexionPDO($connexion);

        return $nb;
    }

    /**
     * recherche des inscriptions au calendrier pour le mois $month de l'année $year et le contexte $idContexte
     * 
     * @param int $month : numéro du mois
     * @param int $year : millésime
     * @param string $pseudo : limitation  éventuelle à l'utilisateur $pseudo
     * 
     * @return array
     */
    public function getInscriptions($month, $year, $pseudo = Null)
    {
        // À quel contexte correspond la date du début de mois?
        $dateFirstOfMonth = sprintf('01-%02d-%d', $month, $year);

        $listeContextes = $this->getListeContextes();
        $idContexte = $this->getContexte4date($dateFirstOfMonth);

        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT date, periode, calendar.pseudo, dateInscription, confirme, ';
        $sql .= 'civilite, nom, prenom, experience ';
        $sql .= 'FROM ' . PFX . 'calendar as calendar ';
        $sql .= 'LEFT JOIN ' . PFX . 'users AS users ON users.pseudo = calendar.pseudo ';
        $sql .= 'WHERE date LIKE :yearMonth ';
        if ($pseudo != Null)
            $sql .= 'AND calendar.pseudo = :pseudo ';
        $sql .= 'ORDER BY date, periode, dateInscription ';

        $requete = $connexion->prepare($sql);

        // mois sous la forme YYYYY-MM (avec deux signes pour le mois)
        $yearMonth = sprintf('%d-%02d', $year, $month) . '%';
        // Application::afficher($yearMonth, true);
        $requete->bindParam(':yearMonth', $yearMonth, PDO::PARAM_STR, 7);
        if ($pseudo != Null)
            $requete->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 7);

        $liste = array();
        $resultat = $requete->execute();

        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()) {
                $date = $ligne['date'];
                $periode = $ligne['periode'];
                $pseudo = $ligne['pseudo'];
                $noJour = intval(substr($date, 8, 2));
                $ligne['civilite'] = Application::civilite($ligne['civilite']);
                $liste[$noJour][$periode][$pseudo] = $ligne;
            }
        }

        Application::deconnexionPDO($connexion);

        return $liste;
    }

    /**
     * renvoie les inscriptions de l'utilisateur $pseudo sous la forme d'un tableau
     * comprenant toutes ses inscriptions sous la forme YYYY-mm-dd_p (où p est la période)
     *     // array (
     * //     0 => '2024-03-01_1',
     * //     1 => '2024-03-01_2',
     * //     2 => '2024-03-01_3',
     * //     3 => '2024-03-01_4',
     * //     4 => '2024-03-01_5',
     * //     5 => '2024-03-01_6',
     * //     6 => '2024-03-02_1',
     * //     7 => '2024-03-02_2',
     * //     8 => '2024-03-07_4',
     * //   )
     * 
     * @param int $month : numéro du mois
     * @param int $year : millésime
     * @param string $pseudo : limitation  éventuelle à l'utilisateur $pseudo
     * 
     * @return array
     */
    public function getInscriptionsArray($month, $year, $pseudo)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT date, periode ';
        $sql .= 'FROM ' . PFX . 'calendar ';
        $sql .= 'WHERE date LIKE :date AND pseudo = :pseudo ';
        $sql .= 'ORDER BY date, periode ';
        $requete = $connexion->prepare($sql);

        $date = sprintf('%d-%02d-', $year, $month);
        $date = $date . '%';
        $requete->bindParam(':date', $date, PDO::PARAM_STR, 10);
        $requete->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 7);

        $liste = array();
        $resultat = $requete->execute();

        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()) {
                $inscription = sprintf('%s_%d', $ligne['date'], $ligne['periode']);
                $liste[] = $inscription;
            }
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
    }

    /**
     * Enregistre une inscription à la permanence YYYY-mm-dd_P pour 
     * le bénévole $pseudo
     * 
     * @param int $idContexte
     * @param string $date
     * @param int $periode
     * @param string $pseudo
     * 
     * @return int
     */
    public function savePermanence($idContexte, $date, $periode, $pseudo)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'INSERT IGNORE INTO ' . PFX . 'calendar ';
        $sql .= 'SET date = :date, periode = :periode, pseudo = :pseudo, idContexte = :idContexte ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':idContexte', $idContexte, PDO::PARAM_INT);
        $requete->bindParam(':date', $date, PDO::PARAM_STR, 10);
        $requete->bindParam(':periode', $periode, PDO::PARAM_INT);
        $requete->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 7);


        $resultat = $requete->execute();
        ;

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * Supprimer une inscription à la $permanence de la période $periode pour 
     * le bénévole $pseudo dans le contexte $idContexte
     * 
     * @param int $idContexte
     * @param string $date
     * @param int $periode
     * @param string $pseudo
     * 
     * @return int
     */
    public function deletePermanence($date, $periode, $pseudo)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'DELETE FROM ' . PFX . 'calendar ';
        $sql .= 'WHERE date = :date AND periode = :periode AND pseudo = :pseudo ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':date', $date, PDO::PARAM_STR, 10);
        $requete->bindParam(':periode', $periode, PDO::PARAM_INT);
        $requete->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 7);


        $resultat = $requete->execute();
        ;

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * Inverse la valeur du champ "confirme" pour une inscription de
     * l'utilisateur $pseudo pour la $date et la $periode puis renvoie la nouvelle
     * valeur du champ
     * 
     * @param string $pseudo
     * @param string $date
     * @param int $idContexte
     * @param int $periode
     * 
     * @return int
     */
    public function checkUncheck($idContexte, $pseudo, $date, $periode)
    {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'INSERT INTO ' . PFX . 'calendar ';
        $sql .= 'SET pseudo = :pseudo, idContexte = :idContexte, date = :date, periode = :periode,  confirme = 1 ';
        $sql .= 'ON DUPLICATE KEY UPDATE confirme = 1 - confirme ';

        $requete = $connexion->prepare($sql);

        $requete->bindParam(':date', $date, PDO::PARAM_STR, 10);
        $requete->bindParam(':periode', $periode, PDO::PARAM_INT);
        $requete->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 7);
        $requete->bindParam(':idContexte', $idContexte, PDO::PARAM_INT);

        $resultat = $requete->execute();

        $confirme = Null;
        if ($resultat) {
            $sql = 'SELECT confirme FROM ' . PFX . 'calendar ';
            $sql .= 'WHERE pseudo = :pseudo AND date = :date AND periode = :periode ';
            $requete = $connexion->prepare($sql);

            $requete->bindParam(':date', $date, PDO::PARAM_STR, 10);
            $requete->bindParam(':periode', $periode, PDO::PARAM_INT);
            $requete->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 7);

            $resultat = $requete->execute();
            if ($resultat) {
                $ligne = $requete->fetch();
                $confirme = $ligne['confirme'];
            }
        }

        Application::DeconnexionPDO($connexion);

        return $confirme;
    }


   /**
    * renvoie la liste des mois de planning existant dans la base de données
    * 
    * @param 
    *
    * return array
    */
    public function getListeMonths() {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT DISTINCT SUBSTR(date, 1, 7) AS mois ';
        $sql .= 'FROM '.PFX.'calendar ORDER BY mois; ';
        $requete = $connexion->prepare($sql);

        $resultat = $requete->execute();

        $liste = array();
        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()){
                $liste[] = $ligne['mois'];
            }
        }

        Application::DeconnexionPDO($connexion);

        return $liste;
    }

     /**
     * renvoie le statut de freezing des mois de la liste $monthsList
     * 
     * @param array $monthsList
     * 
     * @return array
     */
    public function getFreezings4month($listeMonths){
        $listeMonthsString = "'".implode("','", $listeMonths)."'";
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT date, status  ';
        $sql .= 'FROM '.PFX.'freeze ';
        $sql .= 'WHERE date IN ('.$listeMonthsString.') ';
        $sql .= 'ORDER BY date ';
        $requete = $connexion->prepare($sql);

        $resultat = $requete->execute();
        $requete->setFetchMode(PDO::FETCH_ASSOC);

        $freezes = array();
        while ($ligne = $requete->fetch()){
            $date = $ligne['date'];
            $laDate = explode('-', $date);
            $year = $laDate[0];
            $month = $laDate[1];
            $monthName = $this->monthName($month);
            $status = $ligne['status'];
            $freezes[$date] = array(
                'year' => $laDate[0],
                'month' => $laDate[1],
                'dateFr' => sprintf('%s %d', $monthName, $year), 
                'status' => $status);
            }

        foreach ($listeMonths as $wtf => $monthYear) {
            if (!(isset($freezes[$monthYear]))) {
                $monthYearArray = explode('-', $monthYear);
                $year = $monthYearArray[0];
                $month = $monthYearArray[1];
                $monthName = $this->monthName($month);
                $freezes[$monthYear] = array(
                    'year' => $year,
                    'month' => $month,
                    'dateFr' => sprintf('%s %d', $monthName, $year), 
                    'status' => 0,
                );
            }
        }

        Application::DeconnexionPDO($connexion);

        return $freezes;
    }

    /**
     * Enregistre le statut de gel de la période $date avec le statut $status
     * 
     * @param string $date
     * @param int $statut
     * 
     * @return int
     */
    public function saveFreezeStatus($date, $status) {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'INSERT INTO '.PFX.'freeze ';
        $sql .= 'SET date = :date, status = :status ';
        $sql .= 'ON DUPLICATE KEY UPDATE status = :status ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':status', $status, PDO::PARAM_INT);
        $requete->bindParam(':date', $date, PDO::PARAM_STR, 7);

        $resultat = $requete->execute();

        $nb = $requete->rowCount();
        // limiter la valeur de $nb en cas de "update"
        $nb = ($nb > 1) ? 1 : $nb;
            
        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * retourne le statut de freezing pour la période $year, $month
     * 
     * @param string $year
     * @param int $month
     * 
     * @return int
     */
    public function getFreezeStatus4mois($year, $month) {
        $date = sprintf('%s-%02d', $year, $month);
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT status FROM '.PFX.'freeze ';
        $sql .= 'WHERE date = :date ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':date', $date, PDO::PARAM_STR, 7);

        $resultat = $requete->execute();

        // valeur par défaut si aucun freeze défini
        $status = 0; 
        if ($resultat) {
            $ligne = $requete->fetch();
            $status = $ligne['status'];
            if ($status == Null)
                $status = 0;
        }

        Application::DeconnexionPDO($connexion);

        return $status;
    }

    /**
     * renvoie les mois figurant dans le calendrier planning
     * 
     * @param
     * 
     * @return array
     */
    public function getCalendarMonths() {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT DISTINCT SUBSTRING(date, 1, 7) AS mois ';
        $sql .= 'FROM '.PFX.'calendar ';
        $sql .= 'ORDER BY mois ';
        $requete = $connexion->prepare($sql);

        $resultat = $requete->execute();

        $requete->setFetchMode(PDO::FETCH_ASSOC);
        $listeMois = array();
        while ($ligne = $requete->fetch()){
            // $mois sous la forme YYYY-mm
            $mois = $ligne['mois'];
            $laDate = explode('-', $mois);
            $year = $laDate[0];
            $month = $laDate[1];
            $monthName = $this->monthName($month);
            $listeMois[$mois] = array('year' => $year, 'month' => $month, 'monthName' => $monthName);
        }

        Application::DeconnexionPDO($connexion);

        return $listeMois;
    }

    /**
     * Effacement de tout le calendrier planning d'un $month et d'une $year donnés
     * 
     * @param int $month
     * @param int $year
     * 
     * @return int
     */
    public function deleteCalendar($year, $month) {
        $periode = sprintf('%d-%02d-', $year, $month).'%';
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'DELETE FROM '.PFX.'calendar ';
        $sql .= 'WHERE date LIKE :periode ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':periode', $periode, PDO::PARAM_STR, 9);

        $resultat = $requete->execute();

        $nb = $requete->rowCount();
        
        Application::DeconnexionPDO($connexion);

        return $nb;
    }

    /**
     * Recherche la liste de tous les bénévoles pas encore approuvés
     * 
     * @param 
     * 
     * @return array
     */
    public function getUnapprovedUsers(){
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'SELECT pseudo, nom, prenom, mail ';
        $sql .= 'FROM '.PFX.'users ';
        $sql .= 'WHERE approuve = 0 ';
        $sql .= 'ORDER BY nom, prenom ';
        echo $sql;
        $requete = $connexion->prepare($sql);

        $resultat = $requete->execute();

        $liste = array();
        if ($resultat) {
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            while ($ligne = $requete->fetch()){
                $pseudo = $ligne['pseudo'];
                $liste[$pseudo] = $ligne;
            }
        }
        
        Application::DeconnexionPDO($connexion);

        return $liste;
    }

    /** 
     * Approuve l'inscription de l'utilisateur $pseudo
     * 
     * @param string $pseudo
     * 
     * @return int
     */
    public function approuve($pseudo) {
        $connexion = Application::connectPDO(SERVEUR, BASE, NOM, MDP);
        $sql = 'UPDATE '.PFX.'users ';
        $sql .= 'SET approuve = 1 ';
        $sql .= 'WHERE pseudo = :pseudo ';
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 7);

        $resultat = $requete->execute();

        $nb = $requete->rowCount();

        Application::DeconnexionPDO($connexion);

        return $nb;
    }


}