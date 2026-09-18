<?php

$main_menu = get_custom_menu('main-menu');

foreach ($main_menu as $item) :
    //print_var($item->object_id);
?>
    <?php if (empty($item->child_items)) : // se nao tem filhos 
    ?>
        <li class="nav-item w-100-mobile">
            <?php
                //$post_id = url_to_postid($item->url);
                $slug = get_post_field('post_name', $item->object_id);
            ?>
            <a 
                class="nav-link py-2 <?php if (is_front_page()) : echo 'smooth'; endif; ?>" 
                title="Vá para a página <?php echo $item->title; ?>" 
                href="<?php if (!is_front_page()) : echo  bloginfo('url'); endif; echo  bloginfo('url');?>/#<?php echo $slug; ?>"
            >
                    <?php echo $item->title; ?>
            </a>
        </li>

    <?php else : // se tem filhos 
    ?>

       
    <?php endif; ?>
<?php endforeach; ?>


