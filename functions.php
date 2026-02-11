<?php


function randonnee_styles() {
    wp_enqueue_style(
        'randonnee-style',
        get_template_directory_uri() . '/css/randonnee.css',
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'randonnee_styles');

// Custom Post Type : Création numérique
function randonnee_cpt() {

    $labels = array(
        'name'               => 'Randonnées',
        'singular_name'      => 'Randonnées',
        'menu_name'          => 'Menu des randonnées',
        'name_admin_bar'     => 'Randonnées',
        'add_new'            => 'Ajouter',
        'add_new_item'       => 'Ajouter une rando',
        'new_item'           => 'Nouvelle rando',
        'edit_item'          => 'Modifier la rando',
        'view_item'          => 'Voir la rando',
        'all_items'          => 'Toutes les randos',
        'search_items'       => 'Rechercher une rando',
        'not_found'          => 'Aucune rando trouvée',
        'not_found_in_trash' => 'Aucune rando dans la corbeille',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-art',
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive'        => true,
        'rewrite' => ['slug' => 'randonnee'],
        'show_in_rest'       => true, // Gutenberg
    );

    register_post_type('randonnee', $args);
}
add_action('init', 'randonnee_cpt');




function difficulte_taxonomy() {
    register_taxonomy(
        'difficulte',
        ['randonnee'],
        [
            'labels' => [
                'name' => 'difficulte',
                'singular_name' => 'difficulte',
            ],
            'public' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'rewrite' => ['slug' => 'difficulte'],
        ]
    );
}
add_action('init', 'difficulte_taxonomy');





/* function randonnee_cpt() {
register_post_type('...', [
'labels' => [
'name' => 'Randonnées',
'singular_name' => 'Randonnées',
'add_new_item' => 'Ajouter une randonnée',
'edit_item' => 'Modifier la randonnée',
],
'public' => true,
'has_archive' => true,
'rewrite' => ['slug' => 'randonnee'],
'supports' => ['title', 'editor', 'excerpt'],
'show_in_rest' => true,
'menu_icon' => 'dashicons-admin-site',
]);
}
add_action('init', 'randonnee_cpt'); */