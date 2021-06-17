<?php

namespace App\MainFunction;

use DB;
use Config;
use Session;
use Carbon\Carbon;

class MainFunction {

    public function __construct() {
        
    }

    function print_result() {
        if (session::has('success')) {
            $success = session::get('success');
            ?>
            <div class="alert alert-success">
                <?php echo "$success" ?>
            </div>
            <?php
        } else if (session::has('failed')) {
            $failed = session::get('failed');
            ?>
            <div class="alert alert-danger">
                <?php echo "$failed" ?>
            </div>
            <?php
        }
    }

    function getsidemenu($queryceklistmenu, $queryceklistsubmenu, $role) {
        ?>
        <div id="menu">
            <a href="<?php echo url('/_admin_login/home') ?>" title="Dashboard"><i class="icon-home"></i><span>Home</span></a>
            <?php
            $menulvlcomp = 1;
            foreach ($queryceklistmenu as $menu) {
                $menuid = $menu->id;
                $displayname = $menu->displayname;
                $value = $menu->value;
                $link = $menu->link;
                $icon = $menu->icon;
                $ishavechild = $menu->ishavechild;
                $parentid = $menu->parentid;
                $menulvl = $menu->menulvl;
                if ($ishavechild == 0) {
                    ?>
                    <a href="<?php echo url($link) ?>" title="<?php echo "$value" ?>"><i class="<?php echo "$icon" ?>"></i><span><?php echo "$displayname" ?></span></a>
                    <?php
                } else if ($ishavechild == 1) {
                    ?>
                    <a href="" title="<?php echo "$displayname" ?>" class="submenu" name="<?php echo "$value" ?>"><i class="<?php echo "$icon" ?>"></i><span><?php echo "$displayname" ?></span></a>
                    <div id="<?php echo "$value" ?>" style="display: none;">
                        <?php
                        foreach ($queryceklistsubmenu as $submenu) {
                            $parentidsub = $submenu->parentid;
                            $displaynamesub = $submenu->displayname;
                            $linksub = $submenu->link;
                            $iconsub = $submenu->icon;
                            if ($parentidsub == $menuid) {
                                ?>
                                <a href="<?php echo url($linksub) ?>" title="User Login"><i class="<?php echo "$iconsub" ?>"></i><span><?php echo "$displaynamesub" ?></span></a>

                                <?php
                            }
                        }
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
            <a href="<?php echo url('/_admin_login/logout') ?>" title="Dashboard"><i class="fa fa-sign-out"></i><span>Log Out</span></a>
        </div>
        <?php
    }

    function headertext($text) {
        $print = $text;
        ?>
        <div class="headertext">
            <h2 style="position: relative;top:5px;"><?php echo "$print" ?></h2>
        </div>
        <?php
    }

    function textbox($type, $name, $class = '', $value = '', $id = '', $placeholder = '', $required = 0, $readonly = 0) {
        if ($readonly == 1) {
            $readonly_print = "readonly =" . '"' . 'readonly' . '"';
        } else if ($readonly == 0) {
            $readonly_print = "";
        }
        if ($required == 0) {
            ?>
            <input type="<?php echo "$type" ?>" name="<?php echo "$name" ?>" class="<?php echo "$class" ?>" value="<?php echo "$value" ?>" id="<?php echo "$id" ?>" placeholder="<?php echo "$placeholder" ?>" <?php echo "$readonly_print" ?>>
            <?php
        } else if ($required == 1) {
            ?>
            <input type="<?php echo "$type" ?>" name="<?php echo "$name" ?>" class="<?php echo "$class" ?>" value="<?php echo "$value" ?>" id="<?php echo "$id" ?>" placeholder="<?php echo "$placeholder" ?>" required="required" <?php echo "$readonly_print" ?>>
            <?php
        }
    }

    function select($name, $class, $arr_list, $value1name, $value2name, $selectvalue) {
        ?>
        <select name="<?php echo "$name" ?>" class="<?php echo "$class" ?>">
            <?php
            foreach ($arr_list as $arr_list) {
                $value = $arr_list->$value1name;
                $print = $arr_list->$value2name;
                if ($value == $selectvalue) {
                    ?>
                    <option value="<?php echo "$value" ?>" selected="selected"><?php echo "$print" ?></option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo "$value" ?>"><?php echo "$print" ?></option>
                    <?php
                }
            }
            ?>
        </select>
        <?php
    }

    function amount($amount) {
        $amountprint = number_format($amount, 0, '.', ',');
        if ($amount < 0) {
            $kirim = "<span style='color:red;font-weight:bold;'>$amountprint</span>";
        } else {
            $kirim = "$amountprint";
        }
        return($kirim);
    }

    public function cutcontent($string) {
        $potong1 = str_replace("<p>", "", "$string");
        $potong2 = str_replace("</p>", "", "$potong1");
        if (strlen($potong2) > 100) {
            $stringCut = substr($potong2, 0, 100);
            $string2 = substr($stringCut, 0, strrpos($stringCut, ' '));
        } else {
            $string2 = $string;
        }
        return $string2;
    }

    function permalink($text) {
        $text = str_replace(' ', '-', $text);
        $text = preg_replace('/[^a-zA-Z0-9-_\.]/', '', $text);
        return $text;
    }

}
