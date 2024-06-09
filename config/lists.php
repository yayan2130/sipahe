<?php
return 
[
    //rulebase 1 (flu)
    [
        "kode_penyakit" => "P01",
        "list_gejala" => ["G01", "G02", "G03", "G04"],
        "next_pertanyaan" => ["G05", "GO6", "G07"],
        "next_treebase" => ["G11"],
        "turunan" => false
    ],
    [
        "kode_penyakit" => "P02",
        "list_gejala" => ["G05", "G06"],
        "next_pertanyaan" => ["G08", "GO9", "G10"],
        "next_treebase" => ["G07"],
        "turunan" => true
    ],
    [
        "kode_penyakit" => "P03",
        "list_gejala" => ["G07"],
        "next_pertanyaan" => ["G08", "GO9", "G10"],
        "next_treebase" => ["G08"],
        "turunan" => true
    ],
    [
        "kode_penyakit" => "P04",
        "list_gejala" => ["G08","G09","G10"],
        "next_pertanyaan" => null,
        "next_treebase" => null,
        "turunan" => true
    ],
    //rulebase 2 (perut menggembung)
    //rule ke P05
    [
        "kode_penyakit" => null,
        "list_gejala" => ["G11"],
        "next_pertanyaan" => ["G12"],
        "next_treebase" => ["G16"],
    ],
    [
        "kode_penyakit" => "P05",
        "list_gejala" => ["G12"],
        "next_pertanyaan" => null,
        "next_treebase" => ["G13"],
    ],
    //rule ke P06 & P07    
    [
        "kode_penyakit" => null,
        "list_gejala" => ["G13"],
        "next_pertanyaan" => ["G14"],
        "next_treebase" => ["G15"],
    ],
    [
        "kode_penyakit" => "P06",
        "list_gejala" => ["G14"],
        "next_pertanyaan" => null,
        "next_treebase" => ["G15"],
    ],
    [
        "kode_penyakit" => "P07",
        "list_gejala" => ["G15"],
        "next_pertanyaan" => null,
        "next_treebase" => null,
    ],
    
    //rulebase 3 (gatal)
    [
        "kode_penyakit" => "P08",
        "list_gejala" => ["G16","G17"],
        "next_pertanyaan" => ["G18"],
        "next_treebase" => null,
    ],
    [
        "kode_penyakit" => "P09",
        "list_gejala" => ["G18"],
        "next_pertanyaan" => null,
        "next_treebase" => ["G19"],
        "turunan" => true

    ],
    [
        "kode_penyakit" => "P10",
        "list_gejala" => ["G19","G20"],
        "next_pertanyaan" => [],
        "next_treebase" => ["G21"],
        "turunan" => true
    ],
    [
        "kode_penyakit" => "P11",
        "list_gejala" => ["G21"],
        "next_pertanyaan" => null,
        "next_treebase" => null,
        "turunan" => true
    ],
];
?>