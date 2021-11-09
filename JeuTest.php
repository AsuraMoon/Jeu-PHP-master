<?php

Class Perso
{
    Public $Clan;
    Public $PointsDeVieMax;
    Public $PointsDeVie;
    Public $Armes;
    Public $Armor;
    Public $ObjetDeSoins;
    Public $NbrDeSoins;
    Public $NbrDeSoinsEffectues=0;

    Public function __construct( $Clan , $PointsDeVieMax , $Armes , $Armor , $ObjetDeSoins , $NbrDeSoins)
    {
        $this->Clan=$Clan;
        $this->PointsDeVieMax=$PointsDeVieMax;
        $this->PointsDeVie=$PointsDeVieMax;
        $this->Armes=$Armes;
        $this->Armor=$Armor;
        $this->ObjetDeSoins=$ObjetDeSoins;
        $this->NbrDeSoins=$NbrDeSoins;
    }

    Public function Attaque($Cible)
    {
        $Degats = rand( 1 , $this->Armes-$Cible->Armor);
        $Cible->PointsDeVie-=$Degats;
        return $Degats;
    }

    Public function Heal()
    {
        $Soins=rand( 1 , $this->ObjetDeSoins );
        $this->PointsDeVie += $Soins;
        $this->NbrDeSoinsEffectues++;
        return $Soins;
    }

    Public function Alive ()
    {
        return $this->PointsDeVie > 0;
    }

}

    /*$Lily = new Perso ('Mal' , 777 , 10000 , 0 , 10000 , 1)*/
    $GOD = new Perso('Bien' , 800 , 80 , 42 , 344 , 7);
    $EVIL = new Perso('Mal' , 666 , 88 , 66 , 0 , 0);
    /*$Kiwi = new Perso('Bien' , 500 , 70 , 70 , 100 , 5);*/


While ( $GOD->Alive() && $EVIL->Alive() )
{
    if($GOD->PointsDeVie<$GOD->PointsDeVieMax/2 && $GOD->NbrDeSoins>$GOD->NbrDeSoinsEffectues)
    {
        Echo "God s'est soigné de ".$GOD->Heal()."</br>";
    }
    Echo "God a infligé ".$GOD->Attaque($EVIL)." et Evil a infligé ".$EVIL->Attaque($GOD)."</br>";
    Echo "God a $GOD->PointsDeVie et Evil a $EVIL->PointsDeVie </br>" ;
}

?>