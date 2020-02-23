<?php
class Unit {
	public $unitName;
	public $unitType;
	
	
	public $Movement;
	public $WeaponSkill;
	public $BalisticSkill;
	public $Strength;
	public $Toughness;
	public $Wounds;
	public $Initiative;
	public $Attacks;
	public $Leadership;
	public $ArmorSave;
	
	public $MaxMovement;
	public $MaxWeaponSkill;
	public $MaxBalisticSkill;
	public $MaxStrength;
	public $MaxToughness;
	public $MaxWounds;
	public $MaxInitative;
	public $MaxAttacks;
	public $MaxLeadership;

	public $skillList;
	public $exp;
	public $skills;
	public $items;
  
  public function __construct ($unitName, $unitType, $Movement, $WeaponSkill, $BalisticSkill, $Strength, $Toughness, $Wounds, $Initiative, $Attacks, $Leadership, $ArmorSave, $MaxMovement, $MaxWeaponSkill, $MaxBalisticSkill, $MaxStrength, $MaxToughness, $MaxWounds, $MaxInitative, $MaxAttacks, $MaxLeadership, $skillList, $exp, $skills, $items) {
    $this->unitName = $unitName;
    $this->unitType = $unitType;
	$this->Movement = $Movement;
    $this->WeaponSkill = $WeaponSkill;
	$this->BalisticSkill = $BalisticSkill;
    $this->Strength = $Strength;
    $this->Toughness = $Toughness;
	$this->Wounds = $Wounds;
    $this->Initiative = $Initiative;
	$this->Attacks = $Attacks;
    $this->Leadership = $Leadership;
	$this->ArmorSave = $ArmorSave;
	
    $this->MaxMovement = $MaxMovement;
	$this->MaxWeaponSkill = $MaxWeaponSkill;
    $this->MaxBalisticSkill = $MaxBalisticSkill;
	$this->MaxStrength = $MaxStrength;
    $this->MaxToughness = $MaxToughness;
	$this->MaxWounds = $MaxWounds;
    $this->MaxInitative = $MaxInitative;
	$this->MaxAttacks = $MaxAttacks;
    $this->MaxLeadership = $MaxLeadership;
	
	$this->skillList = $skillList;
    $this->exp = $exp;
	$this->skills = $skills;
    $this->items = $items;
  }
}