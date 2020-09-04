<!-- INCLUDE DATABASE -->
<?php require_once "./settings/db.php"; ?>
<!-- INCLUDE LEANER -->
<?php require_once "./classes/Learner.class.php"; ?>
<!-- INCLUDE MANAGER -->
<?php require_once "./classes/Manager.class.php"; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - POO</title>
</head>

<body>
    <?php
        $value1 = "corentin";
        $value2 = "chopin";
        $value3 = "19";
        $value4 = "1.81";
        $value5 = "apprenant";
        $learner = new Learner();
        
        // FOR FIRST NAME
        $firstname= $learner->getFirstName();
        $learner->setFirstName('Ceci');
        $firstname_set = $learner->getFirstName();

        //FOR LAST NAME
        $lastname = $learner->getLastName();
        $learner->setLastName('test');
        $lastname_set = $learner->getLastName();

        //FOR AGE
        $age = $learner->getAge();
        $learner->setAge(23);
        $age_set = $learner->getAge();

        //FOR SIZE
        $size = $learner->getSize();
        $learner->setSize('1.58');
        $size_set = $learner->getSize();

        //FOR STATUS
        $status = $learner->getStatus();
        $learner->setStatus('formateur');
        $status_set = $learner->getStatus();

        //ECHO FOR ALL ATTRIBUTES
        echo '<h2>LIST OF ALL ATTRIBUTES</h2>';
        echo $firstname.'<Br>';
        echo $lastname.'<Br>';
        echo $age.'<Br>';
        echo $size.'<Br>';
        echo $status.'<Br>';
        echo '<h2>LIST OF ALL ATTRIBUTES VIA SET</h2>';
        echo $firstname_set.'<Br>';
        echo $lastname_set.'<Br>';
        echo $age_set.'<Br>';
        echo $size_set.'<Br>';
        echo $status_set.'<Br>';
        echo '<h2>FOR METHOD CONCATENATION</h2>';
        $learner->describe();
        ?>
    <h2>FOR HYDRATE</h2>
    <?php
        $tab = [
            'firstname' => 'corentin',
            'lastname' => 'chopin', 
            'age' => 19, 
            'size' => 1.81, 
            'status' => 'apprenant'
        ];
        $tableau = $learner->hydrate($tab);
        $learner->describe();
        //CREATION D'UN TABLEAU AVEC FOREACH
        echo '<h2>CREATING ARRAY WITH FOREACH</h2>';
        echo '<ul>';
        foreach ($tableau as $key => $value){
            echo '<li>'.$key.'&nbsp;:&nbsp;'.$value.'</li>';
        }
        echo '</ul>';
        echo '<h2>NEW PARAMETER (LEARNER 2)</h2>';
        $learner2 = new Learner();
        $tab2 = [
            'firstname' => 'Dylan',
            'lastname' => 'Bourgain', 
            'age' => 24, 
            'size' => 1.74,
            'status' => 'apprenant'
        ];
        echo '<pre>';
            print_r($tab2);
        echo '</pre>';
        echo '<h2>NEW PARAMETER (LEARNER 1)</h2>';
        echo '<pre>';
            print_r($tab);
        echo '</pre>';
        $tableau2 = $learner2->hydrate($tab2);
        echo '<h2>CONCATENATION FOR NEW LEARNER2</h2>';
        $learner2->describe();
        echo '<h2>CONCATENATION FOR NEW LEARNER1</h2>';
        $learner->describe();
        echo '<h2>CREATING ARRAY WITH FOREACH FOR NEW LEARNER2</h2>';
        echo '<ul>';
        foreach ($tableau2 as $key => $value){
            echo '<li>'.$key.'&nbsp;:&nbsp;'.$value.'</li>';
        }
        echo '</ul>';
        echo '<h2>CREATING ARRAY WITH FOREACH FOR NEW LEARNER</h2>';
        echo '<ul>';
        foreach ($tableau as $key => $value){
            echo '<li>'.$key.'&nbsp;:&nbsp;'.$value.'</li>';
        }
        echo '</ul>';
        echo '<h2>RECUP DB VIA Manager OBJECT</h2>';
        // $tab = ['firstname' => 'Iron-man'];

        $manager = new Manager($db);
        $learner = $manager->select('corentin');
        
        $learner->describe();
        echo '<h2>RECUP DB VIA MULTIPLE Manager OBJECT</h2>';
        $learner1 = $manager->select('corentin');
        $learner2 = $manager->select('guillaume');
        $learner3 = $manager->select('nicolas');

        $learner1->describe();
        echo '<br>';
        $learner2->describe();
        echo '<br>';
        $learner3->describe();
        echo '<h2>CREATE NEW APPRENANT IN DB WHIT OBJECT</h2>';
        echo '<h3>DISPLAY ARRAY</h3>';
        $value1 ="toto";
        $value2 ="coucou";
        $value3 ="44";
        $value4 ="2.30";
        $value5 ="formateur";
        $tab = array('lastname' => $value1, 'firstname' => $value2, 'age' => $value3, 'size' => $value4, 'situation' => $value5);
        echo '<pre>';
            print_r($tab);
        echo '</pre>';
        $learner = $manager->create($value1, $value2, $value3, $value4, $value5);
        echo '<h3>DISPLAY CONCATENATION WITH LEARNERS DB</h3>';
        $learner4 = $manager->select('dylan');
        $learner4->describe();
        echo '<br>';
        $learner5 = $manager->select('toto');
        $learner5->describe();
        echo '<h2>USING CONTANTE</h2>';
        $learner3->setStatus(Learner::FORMATEUR);
        $resultconst = $learner3->getStatus();
        echo $resultconst;
        ?>
</body>
</html>