<?php

$plugin_name = "CategoryContent";
$migration = "Version20160218160500";


//ディレクトリ作成
$ary_dirs = array(
    $plugin_name . "/Entity",
    $plugin_name . "/Form/Extension",
    $plugin_name . "/Migration",
    $plugin_name . "/Repository",
    $plugin_name . "/Resource/doctrine",
    $plugin_name . "/Resource/template/Admin",
    $plugin_name . "/ServiceProvider"
  );
foreach ($ary_dirs as $dir) {
    echo "./" . $dir . "Created!\n";
    mkdir("./" . $dir,0755,TRUE);
}

//スケルトン作成
$template_dir = "./templates";

$ary_files = array(
   //テンプレートファイル,出力先
    array("/__plugin__Event.php.tpl",                                                        $plugin_name . "Event.php"),
    array("/config.yml.tpl",                                                                 "config.yml"),
    array("/event.yml.tpl",                                                                  "event.yml"),
    array("/PluginManager.php.tpl",                                                          "PluginManager.php"),
    array("/Entity/__plugin_name__.php.tpl",                                                 "Entity/" . $plugin_name . ".php"),
    array("/Form/Extension/__plugin_name__Extension.php.tpl",                                "Form/Extension/" . $plugin_name . "Extension.php"),
    array("/Migration/migration.php.tpl",                                                    "Migration/" . $migration . ".php"),
    array("/Repository/__plugin_name__Repository.php.tpl",                                   "Repository/" . $plugin_name . "Repository.php"),
    array("/Resource/doctrine/Plugin.__plugin_name__.Entity.__plugin_name__.dcm.yml.tpl",    "Resource/doctrine/Plugin." . $plugin_name . ".Entity." . $plugin_name . ".dcm.yml"),
    array("/Resource/template/Admin/category.twig.tpl",                                      "Resource/template/Admin/category.twig"),
    array("/ServiceProvider/__plugin_name__ServiceProvider.php.tpl",                         "ServiceProvider/" . $plugin_name . "ServiceProvider.php"),
  );


//スケルトン作成
$ary_src = array("__plugin_name__","__migration__");
$ary_dst = array($plugin_name,$migration);

foreach ($ary_files as $file) {
    echo "./" . $plugin_name . "/" . $file[1] . "\n";
    echo $template_dir . $file[0] . "\n";
    $tmp = file_get_contents($template_dir . $file[0]);
    $out = str_replace($ary_src,$ary_dst,$tmp);
    file_put_contents("./" . $plugin_name . "/" . $file[1],$out);
    echo "----------\n";
}


