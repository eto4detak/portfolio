<?php
if(comments_open() || have_comments() ){ 
   if( get_comments_number() ){ ?>
      Количество комментариев: <?=get_comments_number()?> <br>
      <ol>
         <?php
            wp_list_comments(
               array(
                  'style' => 'ol', // формировать список элементов для тега <ol>
                  'per_page' => 10, // количество комментариев на странице
                  'avatar_size' => 74, // размер аватара пользователя
               )
            );
         ?>
      </ol>

      <?php
      // навигация по комментариям
         previous_comments_link( '&larr; Предыдущие комментарии' );
         next_comments_link( 'Следующие комментарии &rarr;' );
      ?>

   <?php }else{?> 
      Нет комментариев к этой публикации
   <?php }?> 

   <?php if( comments_open() ){
      comment_form();
   }else{?> 
      Комментарии у этой публикации отключены
   <?php }?> 
<?php }?>