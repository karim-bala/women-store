<?php
require base_path('controllers/admin/util.php');

if (isset($_GET['id'])){
    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
    $db = \Core\App::resolve(\Core\Database::class );
    $product = $db->query("select * from products where id = :id",[
        'id'=>$id
    ])->find();
    $categories = $db->query("select * from categories",[])->get();
}
if (isset($_POST['submit'])){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $db = \Core\App::resolve(\Core\Database::class);

    if(isset($_POST['title'])) {
        $db->query("UPDATE products SET title=:title WHERE id=:id",[
            'title'=>filter_input(INPUT_POST, 'title'),
            'id'=>$id
        ]);
    }
    if(isset($_POST['price'])) {
        $db->query("UPDATE products SET price=:price WHERE id=:id",[
            'price'=>filter_input(INPUT_POST, 'price'),
            'id'=>$id
        ]);

    }
    if(isset($_POST['description'])) {
        $db->query("UPDATE products SET description=:description WHERE id=:id",[
            'description'=>filter_input(INPUT_POST, 'description'),
            'id'=>$id
        ]);

    }
    if(isset($_POST['category'])) {

        $category = $db->query("SELECT * FROM categories WHERE title=:title",[
            'title'=>filter_input(INPUT_POST, 'category'),
        ])->find();

        if(!$category) {
            $db->query("INSERT INTO categories(title) VALUES (:title)",[
                'title'=>filter_input(INPUT_POST, 'category')
            ]);
            
        }
        $db->query("UPDATE products SET category=:category WHERE id=:id",[
            'category'=>filter_input(INPUT_POST, 'category'),
            'id'=>$id
        ]);

    }


    //todo update the product without insert alwase product image
    if(isset($_FILES['files'])) {
        $path = serialize(uploadImages());
        dd($path);
        $db->query("UPDATE products SET images=:images WHERE id=:id",[
            'id'=>$id,
            'images'=>$path
        ]);

    }


    $product = $db->query("select * from products where id = :id",[
        'id'=>$id
    ])->find();
    $categories = $db->query("select * from categories",[])->get();

}
view('admin/products/create.view.php',[
    'categories'=>$categories,
    'products'=>$product,
    'btn'=>'Update',
    'action'=>'/admin/products/update'
]);