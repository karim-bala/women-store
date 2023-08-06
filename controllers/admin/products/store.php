<?php
require base_path('controllers/admin/util.php');
if (isset($_POST['submit'])){
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    $price = filter_input(INPUT_POST, 'price');
    $category = filter_input(INPUT_POST, 'category');

    //verifier si un categorie existe dans la base de donnee sinon on le s'ajout
    $db = \Core\App::resolve(\Core\Database::class);
    $categoryCount = $db->query("select count(*) from categories where title=:title",[
        'title'=>$category
    ])->find()['count(*)'];

    if ($categoryCount<1){
        //sa senifier que la categorie n'existe pas donc on le s'ajoute
        $db->query("insert into categories (title)values (:title)",[
            'title'=>$category
        ]);
    }
    $paths = serialize(uploadImages());

    //ajoute le produit dans la base de donnee
    $db->query("insert into products (title,price,description,category, images )
                values (:title,:price,:description,:category,:images)",[
                    'title'=>$title,
                    'price'=>$price,
                    'description'=>$description,
                    'category'=>$category,
                    'images'=>$paths
    ]);
    header('location: /admin/products');
}