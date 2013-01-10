<?php
/*
 *Show content,All content in here
 */
?>
    <div id="head">
        <h1 align="center"><?php echo gettext("Survey on the Dream of the Red Chamber");?></h1>
        <p id="hp" align="center"></p>
        <div id="lang">
            <input type="radio" id="zh" name="lang" <?php echo $GLOBALS['lang'] == 'zh' ? "checked='checked'" : NULL; ?> value="zh"/><label for="zh">Chinese</label>
            <input type="radio" id="en" name="lang" <?php echo $GLOBALS['lang'] == 'en' ? "checked='checked'" : NULL; ?> value="en"/><label for="en">English</label>
            <input type="radio" id="de" name="lang" <?php echo $GLOBALS['lang'] == 'de' ? "checked='checked'" : NULL; ?> value="de"/><label for="de">German</label>
        </div>
    </div>
<div id="wrap">
    <div id="content">


        <div class="demo"> 
            <form action="./application/submit.php" method="POST">
                    <div id="survey"> 
                        <div class="notice"><?php echo gettext("Welcome to take part in our online survey and quiz about The Dream of the Red Chamber. If you answer all the quiz questions correctly, you will be entered in a drawing to win a prize of 1,000 yuan renminbi on June 30, 2012.");?></div>
                        <?php
																																				      //print survey in pre-format,which defined in class db2htm
                        for ($i = 1;; $i++) {
                            if (db2htm::printContent($i, $pdoc, $count) == FALSE)
                                break;echo "<br /><br />";
                        }
                        ?>
                        
                        <p>*TODO:scripts check ,lead to Quiz page;add zh and de</p>
                        <a href="#" id="s_b">  &nbsp&nbsp&nbsp&nbsp Next  -->  Quiz &nbsp&nbsp&nbsp&nbsp </a>
                    </div> 
                    <div id="quiz"> 

<div class="notice"><?php 
echo gettext("Thank you for your 
answers. The survey now is finished. Would you also like to take part in 
the quiz, where you can win 1,000 Yuan Renminbi (approx. 130 USD)? The 
winner will be notified on June 30, 2012. Decisions are final. We will 
try to notify everybody with the individual results of your quiz and 
maybe with a winner's notification.");?></div>
                        <p><b>1.<?php echo gettext("Cao Xueqin describes the history of the Jia family, which 
corresponds very closely to the history of his own family, the Cao. Who 
does Cao Xueqin correspond to in the novel?");?></b></p> 
                        <input type="radio" name="a1_" value="a" />A. <?php echo gettext("Jia Zheng/Governance");?>
                        <input type="radio" name="a1_" value="b" />B. <?php echo gettext("Jia Baoyu/Precious Jade");?>
                        <input type="radio" name="a1_" value="c" />C. <?php echo gettext("Jia Lan");?>
                        <p><b>2.<?php echo gettext("What was the title of most manuscript versions, before the printed edition in 1791?");?></b></p>
                        <input type="radio" name="a2_" value="a" />A. <?php echo gettext("The Story of the Stone");?>
                        <input type="radio" name="a2_" value="b" />B. <?php echo gettext("The Dream of the Red Chamber");?>
                        <input type="radio" name="a2_" value="c" />C. <?php echo gettext("Precious Mirror of Love");?>
                        <input type="radio" name="a2_" value="d" />D. <?php echo gettext("The 12 Beautys of Jinling");?>
                        <p><b>3.<?php echo gettext("How was the novel title translated into English in 1815?");?></b></p>
                        <input type="radio" name="a3_" value="a" />A. <?php echo gettext("The Dream of the Red Chamber");?>
                        <input type="radio" name="a3_" value="b" />B. <?php echo gettext("The Red Chamber Dreams");?>
                        <input type="radio" name="a3_" value="c" />C. <?php echo gettext("A Dream of Red Mansions");?>
                        <input type="radio" name="a3_" value="d" />D. <?php echo gettext("The Dreams of the Red Chamber");?>
                        <p><b>4.<?php echo gettext("How was the novel referred to when the first translation of excerpts into English (and French) were published in 1819?");?></b></p>
                        <input type="radio" name="a4_" value="a" />A. <?php echo gettext("Story of the Stone");?>
                        <input type="radio" name="a4_" value="b" />B. <?php echo gettext("The Dream of the Red Chamber");?>
                        <input type="radio" name="a4_" value="c" />C. <?php echo gettext("The Red Chamber Dreams");?>
                        <p><b>5. <?php echo gettext("In which of the two TV film series, 1987 or 2010, was the actress playing Lin Daiyu/Black Jade skinnier?");?></b></p>
                        <input type="radio" name="a5_" value="a" />A. <?php echo gettext("In the adaption of 1987");?>
                        <input type="radio" name="a5_" value="b" />B. <?php echo gettext("In the remake of 2010");?>
                        <p><b>6. <?php echo gettext("Of the two novels The Dream of the Red Chamber and Jin Ping Mei/The Plum in the Golden Vase/Golden Lotus, which one sold better abroad?");?></b></p>
                        <input type="radio" name="a6_" value="a" />A. <?php echo gettext("\"Dream of the Red Chamber\"");?>
                        <input type="radio" name="a6_" value="b" />B. <?php echo gettext("\"Jin Ping Mei/The Plum in the Golden Vase/Golden Lotus\"");?>
                          <br /> <br /><a id="q_b" href="#">&nbsp&nbsp&nbsp&nbsp Next -> Registration &nbsp&nbsp&nbsp&nbsp</a>
                    </div> 
                    
                    <div id="reg"> <div class="notice"><?php
                       echo  gettext("Thank you for your participation. If you want to know the results and to 
have the chance to win 1000 Yuan, please be so kind to leave us your 
email address in order to be informed about the result, if he has won 
the prize (due June 30, 2012), as well as other progress in the HLM 
survey project." );?>
                            </div>
                        <p><?php echo gettext("Email address(for notification of the winner):");?>
                        <input type="text" name="p_email" value="" /> </p>                        
                        <p><?php echo gettext("sex:");?>
                        <input type="radio" name="p_sex" value="male" />male
                        <input type="radio" name="p_sex" value="female" />female</p>
                        <p><?php echo gettext("birth date:");?>
                        <input type="text" name="p_birth" value="" />   </p>
                        <p><?php echo gettext("educational background (highest degree earned):");?>
                        <input type="text" name="p_edu" value="" />  </p>
                        <p><?php echo gettext("Occupation:");?>
                        <input type="text" name="p_occ" value="" />  </p>
                        <p><?php echo gettext("nationality:");?>
                        <input type="text" name="p_nation" value="" />  </p>
                        <p><?php echo gettext("Native language:");?>
                        <input type="text" name="p_lang" value="" /></p> 
                    <input type="submit" value="submit" name="submit" />
                    </div> 
                

            </form></div> </div>
        
        <div id="info">
        <div id="intro" class="ui-widget-content">
            <h3 class="ui-widget-header">introduction</h3>
            <div id="introcontent"><p><?php $msg="
 &nbsp&nbsp&nbsp&nbspThe Dream of the Red Chamber is one of the four great classical Chinese novels. It has been published as a book in 1784 under the title \"Dream of the Red Chamber\". It also also known as \"Story of the Stone\", especially in early manuscript versions, and \"The Passionate Monk's Tale\", \"The Precious Mirror of Love\",\"The Twelve Beauties of Jinling\" [Nanking]. The author is Cao Xueqin, 32 years after his death, Gao E claims to have reconstructed the interim missing last 40 chapters and until today is read in this form of 120 chapters, including an ending. 
 &nbsp&nbsp&nbsp&nbspThe book is a sophisticated artistic work of a great author with an understanding for the different levels of society and the ambiguity of men's character. In the combined forms of family saga, love story, crime story, daoist tale etc. he tells about ordinary life and gives the reader's an early idea of democracy, social reality, life at court, bad officials, feudal aristocracy and their families, decadent life, the imperial examinations, marriages, slaves, hierarchy and ideas of determination. He disputes with Confucianism and Neo-Confucianism as well as social mores and therefore has drawn a rich and intelligent picture of his time.";
            echo gettext("&nbsp&nbsp&nbsp&nbspThe Dream of the Red Chamber is one of the four great classical Chinese novels. It has been published as a book in 1784 under the title \"Dream of the Red Chamber\". It also also known as \"Story of the Stone\", especially in early manuscript versions, and \"The Passionate Monk's Tale\", \"The Precious Mirror of Love\",\"The Twelve Beauties of Jinling\" [Nanking]. The author is Cao Xueqin, 32 years after his death, Gao E claims to have reconstructed the interim missing last 40 chapters and until today is read in this form of 120 chapters, including an ending. 
 &nbsp&nbsp&nbsp&nbspThe book is a sophisticated artistic work of a great author with an understanding for the different levels of society and the ambiguity of men's character. In the combined forms of family saga, love story, crime story, daoist tale etc. he tells about ordinary life and gives the reader's an early idea of democracy, social reality, life at court, bad officials, feudal aristocracy and their families, decadent life, the imperial examinations, marriages, slaves, hierarchy and ideas of determination. He disputes with Confucianism and Neo-Confucianism as well as social mores and therefore has drawn a rich and intelligent picture of his time.");?>			
            </p>
            </div>
        </div>
        </div>
    </div>
    <div id="foot">
        <p>admin here:<a href="./admin/">Login</a></p>
        <!--<p>admin func demo:<a href="./includes/lib/getExcel.php?encoding=gb2312">getExcel(GB2312)</a> | <a href="./includes/lib/getExcel.php?encoding=utf-8">getExcel(UTF)</a> | <a href="./includes/lib/printcount.php">getInfo</a></p>-->
    </div>

</div>