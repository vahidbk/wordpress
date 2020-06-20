<!-- <?php echo exec("whoami") ?> -->

<?php
/*
 * Page: about_my_plugin
 */

// $getSymbolsDictURL = escapeshellcmd('python3 -m pip install setuptools');
// $getSymbolsDictURL = escapeshellcmd('python3 -m pip install jdatetime');


$getSymbolsDictURL = escapeshellcmd('/usr/bin/python3 /var/www/html/wordpress/wp-content/plugins/TraderPlugin/getSymbolsDict.py');
$output = shell_exec($getSymbolsDictURL);
// echo $output;
$symbolsDict = json_decode($output);

piklist('field', array(
  'type' => 'select'
  ,'field' => 'us_states'
  ,'label' => 'Select a state'
  ,'required' => true
  ,'choices' => $symbolsDict
  ,'attributes' => array(
    'class' => 'select2-select'
    ,'style' => 'width: 50%'
    ,'data-placeholder' => 'Choose a State'
  )
));

///////////////////////
// exec("/usr/bin/python2.7 /var/www/html/pythonproject/python.py /var/www/html/file 100525  > /dev/null 2>/dev/null &")


piklist('field', array(
    'type' => 'radio'
    ,'field' => 'subscribe_to_newsletter'
    ,'label' => 'Would you like to subscribe to our newsletter?'
    ,'attributes' => array(
    'class' => 'text'
    )
    ,'choices' => array(
      'yes' => 'Yes'
      ,'no' => 'No'
    )
    ,'value' => 'no'
   ));
   
   piklist('field', array(
    'type' => 'text'
    ,'field' => 'email_address'
    ,'label' => 'Email Address'
    ,'description' => 'Please enter your email address'
    ,'conditions' => array(
      array(
       'field' => 'subscribe_to_newsletter'
       ,'value' => 'yes'
      )
    )
   ));
   piklist('field', array(
    'type' => 'select'
    ,'field' => 'sidebar_left'
    ,'label' => 'Choose Sidebar Menu'
    ,'value' => 'none'
    ,'choices' => array(
        '' => 'Choose Menu'
      )
      + piklist(wp_get_nav_menus()
      ,array(
        'slug'
        ,'name'
      )
    )
  ));

  piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post_meta'
    ,'field' => 'demo_text'
    ,'label' => 'Text box'
    ,'description' => 'Field Description'
    ,'value' => 'Default text'
    ,'capability' => 'edit_pages'
    ,'attributes' => array(
      'class' => 'text'
    )
  ));

   piklist('field', [
    'type'=>'group',
    'field'=>'param1',
    'label'=>'lable of param1',
    'add_more'=>true,
    'fields'=>[
        [
            'type'=>'radio',
            'field'=>'radio1',
            'label'=>'myRadios',
            'choices'=>[
                '1'=>'o1', '2'=>'o2'
            ],
            'attributes'=>[
                'class'=>'myRadio'
            ],
            'columns'=>4
        ],
        [
            'type'=>'select',
            'field'=>'select1',
            'label'=>'mySelect',
            'choices'=>[
                '1'=>'o1', '2'=>'o2'
            ],
            'columns'=>4
        ]
    ]
  ]);

  piklist('field', array(
    'type' => 'submit'
    ,'field' => 'submit'
    ,'value' => 'Submit'
  ));

?>


<script>

  jQuery(document).ready(function () {
    jQuery(".chosen-select").chosen({
        search_contains: true,
        no_results_text: "Nothing found for: ",
        width: "100%",
    });
  });

  jQuery(document).ready(function() {
    jQuery('.select2-select').select2({
        placeholder: "Select a state"
    });
  });


</script>