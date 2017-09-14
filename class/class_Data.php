<?php

class Data
{
    private $_id;
    private $_name;
    private $_price;
    private $_description;
    private $_image;
    private $_category;
    private $_sub_category;
    private $_pic_file;
    private $_pic_alt;

    public function __construct()
    {
        $db = new PDO('mysql:host=;dbname=', '', '');
        $q = $db->query('SELECT * FROM plat');
        while($data = $q->fetch())
        {
            $this->_id[] = $data['id'];
            $this->_name[] = $data['name'];
            $this->_price[] = $data['price'];
            $this->_description[] = $data['description'];
            $this->_image[] = $data['path_image'];
            $cat = explode('-', $data['category']);
            $this->_category[] = $cat[0];
            $this->_sub_category[] = $cat[1];
        }

        $qs = $db->query('SELECT * FROM galery');
        while($datas = $qs->fetch())
        {
            $this->_pic_file[] = $datas['image'];
            $this->_pic_alt[] = $datas['desc_alt'];
        }
    }

    public function sort_dishes_cat($id) //trie entrées, plats, dessert, vins
    {
        if($this->_category[$id] == "entree")
        {
            return "E";
        }
        elseif($this->_category[$id] == "plat")
        {
            return "P";
        }
        elseif($this->_category[$id] == "dessert")
        {
            return "D";
        }
        elseif($this->_category[$id] == "boissons")
        {
            return "B";
        }
        elseif($this->_category[$id] == "vins")
        {
            return "V";
        }
        elseif($this->_category[$id] == "menu")
        {
            return "M";
        }
    }

    public function count_dishes_sub($sub) //trie entrées, plats, dessert, vins
    {
        $i = 0;
        $e = 0;
        $collumn = count($this->_id);
        while($collumn != $i)
        {
            if($this->_sub_category[$i] == $sub)
            {
                $e++;
            }
            $i++;
        }
        return $e;
    }

    public function count_dishes_cat($sub)
    {
        $i = 0;
        $e = 0;
        $collumn = count($this->_id);
        while($collumn != $i)
        {
            if($this->_category[$i] == $sub)
            {
                $e++;
            }
            $i++;
        }
        return $e;
    }

    public function display_galery()
    {
        $i = 0;
        $collumn = count($this->_pic_file);

        while($i != $collumn)
        {
         ?>
              <li>
                 <div class="background-img zoom">
                    <img src="admin/<?php echo $this->_pic_file[$i]; ?>" alt="<?php echo $this->_pic_alt[$i]; ?>">
                 </div>
              </li>
        <?php
            $i++;
        }
    }
/*
    public function count_dishes_cat() //trie entrées, plats, dessert, vins
    {
        $i = 0;
        $collumn = count($this->_id);
        while($collumn != $i)
        {
            if($this->_category[$id] == "entree")
            {
                $this->_c_e++;
            }
            elseif($this->_category[$id] == "plat")
            {
                $this->_c_p++;
            }
            elseif($this->_category[$id] == "dessert")
            {
                $this->_c_d++;
            }
            elseif($this->_category[$id] == "boissons")
            {
                $this->_c_b++;
            }
            elseif($this->_category[$id] == "vins")
            {
                $this->_c_v++;
            }
        }
    }
*/

    /*
       Pour Commencer | Nos Salades | Nos Spécialités | Nos Viandes | Nos
       Burgers | Nos Fromages | Pause Gourmande | Les Glaces | Composez votre
       Coupe | La Coupe Alcoolisée |
     */

    public function display_single($id)
    {
        ?>
        <div class="block-content pb-25 mb-25">
        <?php if($this->_image[$id] == "assets/img/no_picture1.png" || $this->_image[$id] == "assets/img/no_picture6.png" || $this->_image[$id] == "assets/img/no_picture3.png" || $this->_image[$id] == "assets/img/no_picture4.png" || $this->_image[$id] == "assets/img/no_picture2.png" || $this->_image[$id] == "" || $this->_image[$id] == "assets/img/no_picture5.png") { ?>
        <?php } else { ?>
            <a data-fancybox="gallery" href="admin/<?= $this->_image[$id] ?>"><img style="height: 15em; margin-bottom: 10px; border-radius: 20%;" src="admin/<?= $this->_image[$id] ?>" width="auto"  alt="image du plat"></a>
            <?php } ?>
            <h2 class="mb-5"><?= utf8_encode($this->_name[$id]) ?> </h2>
            <p><?= utf8_encode($this->_description[$id]); ?></p>
            <span class="block-price"><?= utf8_encode($this->_price[$id]); ?> &euro;</span>
        <?php
    }

    public function entre()
    {
        $e = 0;
        $aff = 0;
        $alt = 0;
        //% 6 pour un multiple de 6 !
        $collumn = count($this->_id);
        $tab = ['starter', 'salad'];
        if(($this->count_dishes_cat("entree") / 2) != 0)
        {
            $number = $this->count_dishes_cat("entree") / 2;
            if($number % 2 == 0)
            {
                $number++;
            }
        }
        else
        {
            $number = 2;
        }

        while($e != count($tab))
        {
            $tit = 0;
            $i = 0;
            while ($collumn != $i)
            {
                if ($this->sort_dishes_cat($i) == "E")
                {
                    if ($this->_sub_category[$i] == $tab[$e])
                    {
                        if(($aff == 0 || ($aff % $number) == 0) && ($alt % 2) == 0)
                        {
                            $alt++;
                            echo "<div class=\"col-sm-5  col-sm-offset-1 text-center\">";
                        }
                        elseif(($aff == 0 || ($aff % $number) == 0) && ($alt % 2) == 1)
                        {
                            $alt++;
                            echo "<div class=\"col-sm-5 text-center \">";
                        }

                        if($tab[$e] == "starter" && $this->count_dishes_sub($tab[$e]) != 0 && $tit == 0)
                        {
                            echo "<div class='block-cat'>";
                            echo "<h2 class='mb-30'>Pour Commencer </h2>";
                            echo "</div>";
                            $tit++;
                        }
                        elseif($tab[$e] == "salad" && $this->count_dishes_sub($tab[$e]) != 0 && $tit == 0)
                        {
                            echo "<div class='block-cat'>";
                            echo "<h2 class='mb-30'>Nos Salades </h2>";
                            echo "</div>";
                            $tit++;
                        }
                        $aff++;
                        $this->display_single($i);
                         if($i != $this->count_dishes_sub($tab[$e]))
                         {
                            ?>
                            <span class="dots"></span>
                            <?php
                         }
                         echo "</div>";
                        if(($aff == 0 || ($aff % $number) == 0))
                        {
                            echo "</div>";
                        }
                    }
                }
                $i++;
            }
            if($i == 0)
            {
                $empty[] = $tab[$e];
            }
            $e++;
        }

        return $empty;
    }

    public function menu()
    {
        $e = 0;
        $aff = 0;
        $alt = 0;
        //% 6 pour un multiple de 6 !
        $collumn = count($this->_id);
        $tab = ['noon', 'evening'];
        if(($this->count_dishes_cat("menu") / 2) != 0)
        {
            $number = $this->count_dishes_cat("menu") / 2;
            if($number % 2 == 0)
            {
                $number++;
            }
        }
        else
        {
            $number = 2;
        }

        while($e != count($tab))
        {
            $tit = 0;
            $i = 0;
            while ($collumn != $i)
            {
                if ($this->sort_dishes_cat($i) == "M")
                {
                    if ($this->_sub_category[$i] == $tab[$e])
                    {
                        if(($aff == 0 || ($aff % $number) == 0) && ($alt % 2) == 0)
                        {
                            $alt++;
                            echo "<div class=\"col-sm-5  col-sm-offset-1 text-center\">";
                        }
                        elseif(($aff == 0 || ($aff % $number) == 0) && ($alt % 2) == 1)
                        {
                            $alt++;
                            echo "<div class=\"col-sm-5 text-center \">";
                        }

                        if($tab[$e] == "noon" && $this->count_dishes_sub($tab[$e]) != 0 && $tit == 0)
                        {
                            echo "<div class='block-cat'>";
                            echo "<h2 class='mb-30'>Menu du midi </h2>";
                            echo "</div>";
                            $tit++;
                        }
                        elseif($tab[$e] == "evening" && $this->count_dishes_sub($tab[$e]) != 0 && $tit == 0)
                        {
                            echo "<div class='block-cat'>";
                            echo "<h2 class='mb-30'>Menu du soir </h2>";
                            echo "</div>";
                            $tit++;
                        }
                        $aff++;
                        $this->display_single($i);
                         if($i != $this->count_dishes_sub($tab[$e]))
                         {
                            ?>
                            <span class="dots"></span>
                            <?php
                         }
                         echo "</div>";
                        if(($aff == 0 || ($aff % $number) == 0))
                        {
                            echo "</div>";
                        }
                    }
                }
                $i++;
            }
            if($i == 0)
            {
                $empty[] = $tab[$e];
            }
            $e++;
        }

        return $empty;
    }

    public function plat()
    {
        $e = 0;
        $aff = 0;
        $alt = 0;
        $collumn = count($this->_id);
        $tab = ['special', 'meat', 'burger'];
        if(($this->count_dishes_cat("plat") / 2) != 0)
        {
            $number = $this->count_dishes_cat("plat") / 2;
            if($number % 2 == 0)
            {
                $number++;
            }
        }
        else
        {
            $number = 3;
        }

        while($e != count($tab))
        {
            $tit = 0;
            $i = 0;
            while ($collumn != $i)
            {
                if ($this->sort_dishes_cat($i) == "P")
                {
                    if ($this->_sub_category[$i] == $tab[$e])
                    {
                        if(($aff == 0 || ($aff % $number) == 0) && ($alt % 2) == 0)
                        {
                            $alt++;
                            echo "<div class=\"col-sm-5  col-sm-offset-1 text-center\">";
                        }
                        elseif(($aff == 0 || ($aff % $number) == 0) && ($alt % 2) == 1)
                        {
                            $alt++;
                            echo "<div class=\"col-sm-5 text-center \">";
                        }

                        if($tab[$e] == "special" && $this->count_dishes_sub($tab[$e]) != 0 && $tit == 0)
                        {
                            echo "<div class='block-cat'>";
                            echo "<h2 class=\"mb-30\">Nos Spécialités </h2>";
                            echo "</div>";
                            $tit++;
                        }
                        elseif($tab[$e] == "meat" && $this->count_dishes_sub($tab[$e]) != 0 && $tit == 0)
                        {
                            echo "<div class='block-cat'>";
                            echo "<h2 class=\"mb-30\">Nos Viandes </h2>";
                            echo "</div>";
                            $tit++;
                        }
                        elseif($tab[$e] == "burger" && $this->count_dishes_sub($tab[$e]) != 0 && $tit == 0)
                        {
                            echo "<div class='block-cat'>";
                            echo "<h2 class=\"mb-30\">Nos Burgers </h2>";
                            echo "</div>";
                            $tit++;
                        }

                        $aff++;
                        $this->display_single($i);
                         if($i != $this->count_dishes_sub($tab[$e]))
                         {
                            ?>
                            <span class="dots"></span>
                            <?php
                         }
                         echo "</div>";
                        if(($aff == 0 || ($aff % $number) == 0))
                        {
                            echo "</div>";
                        }
                    }
                }
                $i++;
            }
            if($i == 0)
            {
                $empty[] = $tab[$e];
            }
            $e++;
        }

        return $empty;
    }


    public function dessert()
    {
        $e = 0;
        $aff = 0;
        $alt = 0;
        $collumn = count($this->_id);
        $tab = ['cheese', 'cake', 'icecream', 'custom_ice', 'alc_ice'];
        if(($this->count_dishes_cat("dessert") / 2) != 0)
        {
            $number = $this->count_dishes_cat("dessert") / 2;
            if($number % 2 == 0)
            {
                $number++;
            }
        }
        else
        {
            $number = 2;
        }

        while($e != count($tab))
        {
            $i = 0;
            $tit = 0;
            while ($collumn != $i)
            {
                if ($this->sort_dishes_cat($i) == "D")
                {
                    if ($this->_sub_category[$i] == $tab[$e])
                    {
                        if(($aff == 0 || ($aff % $number) == 0) && ($alt % 2) == 0)
                        {
                            $alt++;
                            echo "<div class=\"col-sm-5  col-sm-offset-1 text-center\">";
                        }
                        elseif(($aff == 0 || ($aff % $number) == 0) && ($alt % 2) == 1)
                        {
                            $alt++;
                            echo "<div class=\"col-sm-5 text-center \">";
                        }

                        if($tab[$e] == "cheese" && $this->count_dishes_sub($tab[$e]) != 0 && $tit == 0)
                        {
                            echo "<div class='block-cat'>";
                            echo "<h2 class=\"mb-30\">Nos Fromages </h2>";
                            echo "</div>";
                            $tit++;
                        }
                        elseif($tab[$e] == "cake" && $this->count_dishes_sub($tab[$e]) != 0 && $tit == 0)
                        {
                            echo "<div class='block-cat'>";
                            echo "<h2 class=\"mb-30\">Pause Gourmande </h2>";
                            echo "</div>";
                            $tit++;
                        }
                        elseif($tab[$e] == "icecream" && $this->count_dishes_sub($tab[$e]) != 0 && $tit == 0)
                        {
                            echo "<div class='block-cat'>";
                            echo "<h2 class=\"mb-30\">Les Glaces </h2>";
                            echo "</div>";
                            $tit++;
                        }
                        elseif($tab[$e] == "custom_ice" && $this->count_dishes_sub($tab[$e]) != 0 && $tit == 0)
                        {
                            echo "<div class='block-cat'>";
                            echo "<h2 class=\"mb-30\">Composez votre Coupe </h2>";
                            echo "</div>";
                            $tit++;
                        }
                        elseif($tab[$e] == "alc_ice" && $this->count_dishes_sub($tab[$e]) != 0 && $tit == 0)
                        {
                            echo "<div class='block-cat'>";
                            echo "<h2 class=\"mb-30\">Les Coupe Alcoolisée </h2>";
                            echo "</div>";
                            $tit++;
                        }
                        $aff++;
                        $this->display_single($i);
                         if($i != $this->count_dishes_sub($tab[$e]))
                         {
                            ?>
                            <span class="dots"></span>
                            <?php
                         }
                         echo "</div>";
                        if(($aff == 0 || ($aff % $number) == 0))
                        {
                            echo "</div>";
                        }
                    }
                }
                $i++;
            }
            if($i == 0)
            {
                $empty[] = $tab[$e];
            }
            $e++;
        }

        return $empty;
    }

    public function boissons()
    {
        $collumn = count($this->_id);
        $aff = 0;
        $alt = 0;
        $i = 0;
        if(($this->count_dishes_cat("boissons") / 2) != 0)
        {
            $number = $this->count_dishes_cat("boissons") / 2;
            if($number % 2 == 0)
            {
                $number++;
            }
        }
        else
        {
            $number = 2;
        }

        while ($collumn != $i) {
            if ($this->sort_dishes_cat($i) == "B")
            {
                if($i != $this->count_dishes_cat("boisssons"))
                {
                        if(($aff == 0 || ($aff % $number) == 0) && ($alt % 2) == 0)
                        {
                            $alt++;
                            echo "<div class=\"col-sm-5  col-sm-offset-1 text-center\">";
                        }
                        elseif(($aff == 0 || ($aff % $number) == 0) && ($alt % 2) == 1)
                        {
                            $alt++;
                            echo "<div class=\"col-sm-5 text-center \">";
                        }
                        $aff++;
                        $this->display_single($i);
                         if($i != $this->count_dishes_cat("boissons"))
                         {
                            ?>
                            <span class="dots"></span>
                            <?php
                         }
                         echo "</div>";
                        if(($aff == 0 || ($aff % $number) == 0))
                        {
                            echo "</div>";
                        }
                    }
            }
            $i++;
        }
    }

    public function vins()
    {
        $collumn = count($this->_id);
        $aff = 0;
        $alt = 0;
        $i = 0;
        if(($this->count_dishes_cat("vins") / 2) != 0)
        {
            $number = $this->count_dishes_cat("vins") / 2;
            if($number < 1)
            {
                $number = 1;
            }
            if($number % 2 == 0)
            {
                $number++;
            }
        }
        else
        {
            $number = 2;
        }

        while ($collumn != $i)
        {
            if ($this->sort_dishes_cat($i) == "V")
            {
                if ($i != $this->count_dishes_cat("vins"))
                {
                    if(($aff == 0 || ($aff % $number) == 0) && ($alt % 2) == 0)
                    {
                        $alt++;
                        echo "<div class=\"col-sm-5  col-sm-offset-1 text-center\">";
                    }
                    elseif(($aff == 0 || ($aff % $number) == 0) && ($alt % 2) == 1)
                    {
                        $alt++;
                        echo "<div class=\"col-sm-5 text-center \">";
                    }
                    $aff++;
                    $this->display_single($i);
                     if($i != $this->count_dishes_cat("vins"))
                     {
                        ?>
                        <span class="dots"></span>
                        <?php
                     }
                     echo "</div>";
                    if(($aff == 0 || ($aff % $number) == 0))
                    {
                        echo "</div>";
                    }
                }
            }
            $i++;
        }
    }
}
?>