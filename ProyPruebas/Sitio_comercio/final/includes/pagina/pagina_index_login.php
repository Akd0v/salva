<?php
if($num_rows != 0)
{
    $nextpage= $page +1;
    $prevpage= $page -1;
    $pro = produtos::Singlenton();
    $lastpage = $pro->getLastPage($rows_per_page,$search);
    ?>
    <article id="pagina">
        <ul><?php
            if ($page == 1)
            {
                ?>
                <li class="previous-off">&laquo; Previous</li>
                <li class="active">1</li>
                <?php
                for($i= $nextpage; $i<= $lastpage ; $i++)
                {?>
                    <li><a href="http://localhost:8080/index_login.php?page=<?= $i;?>"><?= $i;?></a></li>
                    <?php
                }
                if($lastpage >$page )
                {?>
                    <li class="next"><a href="http://localhost:8080/index_login.php?page=<?= $nextpage;?>" >Next &raquo;</a></li><?php
                }
                else
                {?>
                    <li class="next-off">Next &raquo;</li>
                    <?php
                }
            }else
            { ?>
                <li class="previous"><a href="http://localhost:8080/index_login.php?page=<?= $prevpage; ?>">&laquo; Previous</a></li>
                <?php
                for($i= 1; $i < $page ; $i++)
                {?>
                    <li><a href="http://localhost:8080/index_login.php?page=<?= $i;?>"><?= $i;?></a></li>
                    <?php
                }?>
                <li class="active"><?= $page;?></li>
                <?php
                for($i= $nextpage; $i<= $lastpage ; $i++)
                {?>
                    <li><a href="http://localhost:8080/index_login.php?page=<?= $i;?>"><?= $i;?></a></li>
                    <?php
                }
                if($lastpage >$page )
                {?>
                    <li class="next"><a href="http://localhost:8080/index_login.php?page=<?= $nextpage;?>" >Next &raquo;</a></li><?php
                }
                else
                {?>
                    <li class="next-off">Next &raquo;</li>
                    <?php
                }
            }?>
        </ul>
    </article>
    <?php
}
?>