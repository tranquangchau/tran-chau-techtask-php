<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recipe;
use App\Entity\Dish;

use App\Repository\LunchRespository;


class LunchController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(){

        $symfony_version = \Symfony\Component\HttpKernel\Kernel::VERSION;

        return $this->render('index.html.twig', [
            'symfony_current' => $symfony_version,
            'php_version' => PHP_VERSION,
        ]);

    }

    /**
     * @Route("/lunch", name="get_lunch", methods={"GET"})
     */
    public function lunch()
    {
        $Dish = new Dish();
        $docktrin = $this->getDoctrine();
        $qr = new LunchRespository($docktrin);
        // $data = $qr->getdishOne();
        $data = $qr->getdishAll();
        $rs = [];
        $more = [];
        foreach ($data as $key => $value) {
            # code...
            $ingre_id = $value ->getidIngredient()->getId();
            $ingre_title = $value ->getidIngredient()->getTitle();
            $ingre_bestBefore = $value ->getidIngredient()->getbestBefore();
            $ingre_userBy = $value ->getidIngredient()->getUseBy();
            $recipe_id = $value ->getidRecipe()->getId();
            $recipe_title = $value ->getidRecipe()->getTitle();
            //var_dump($value ->getId());
            //var_dump($value ->getidRecipe()->getId());
            $tem = [];
            $tem['id']= $recipe_id;
            $tem['title']= $recipe_title;

            $tem_in = [];
            $tem_in['id'] = $ingre_id;
            $tem_in['title'] = $ingre_title;
            $more[$ingre_id] =$tem_in;

            $tem['ingredients'] =$more;

            $rs[$recipe_id]['id']= $recipe_id;
            $rs[$recipe_id]['title']= $recipe_title;
            // $rs[$recipe_id]['ingredients'][$ingre_id]= [];
            // $rs[$recipe_id]['ingredients'][$ingre_id]['id']= $ingre_id;
            // $rs[$recipe_id]['ingredients'][$ingre_id]['title']= $ingre_title;

            $tem_in = [];
            $tem_in['id'] = $ingre_id;
            $tem_in['title'] = $ingre_title;
            //$tem_in['bestBefore'] = $ingre_bestBefore;
            //$tem_in['userBy'] = $ingre_userBy;
            // $tem_in['bestBefore'] = date("YW", strtotime("2011-01-07"));
            // var_dump($ingre_bestBefore->format('Y-m-d H:i:s'));die;
            $tem_in['bestBefore'] = $ingre_bestBefore->format('Y-m-d');
            $tem_in['userBy'] = $ingre_userBy->format('Y-m-d');
            $rs[$recipe_id]['ingredients'][]= $tem_in;
            // $rs[$recipe_id]['ingredients'][$ingre_id]['id']= $ingre_id;
            // $rs[$recipe_id]['ingredients'][$ingre_id]['title']= $ingre_title;            
        }
        //$rs = $tem;
        

        return $this->json($rs);
    }

    /**
     * @Route("/use-by/{date}", name="get_userby", methods={"GET"})
     */
    public function get_userby($date)
    {
        $check = $this->check_input_date($date);
        if(!$check['is_check']){
            return $this->json($check);
        }

        $Dish = new Dish();
        $docktrin = $this->getDoctrine();
        $qr = new LunchRespository($docktrin);
        $data = $qr->getdishUserBy($date);
        $rs = [];
    
        foreach ($data as $key => $value) {            

            $ingre_id = $value ->getidIngredient()->getId();
            $ingre_title = $value ->getidIngredient()->getTitle();
            $ingre_bestBefore = $value ->getidIngredient()->getbestBefore();
            $ingre_userBy = $value ->getidIngredient()->getUseBy();
            $recipe_id = $value ->getidRecipe()->getId();
            $recipe_title = $value ->getidRecipe()->getTitle();
            

            $rs[$recipe_id]['id']= $recipe_id;
            $rs[$recipe_id]['title']= $recipe_title;

            $tem_in = [];
            $tem_in['id'] = $ingre_id;
            $tem_in['title'] = $ingre_title;
            //$tem_in['bestBefore'] = $ingre_bestBefore;
            //$tem_in['userBy'] = $ingre_userBy;
            // $tem_in['bestBefore'] = date("YW", strtotime("2011-01-07"));
            // var_dump($ingre_bestBefore->format('Y-m-d H:i:s'));die;
            $tem_in['bestBefore'] = $ingre_bestBefore->format('Y-m-d');
            $tem_in['userBy'] = $ingre_userBy->format('Y-m-d');
            $rs[$recipe_id]['ingredients'][]= $tem_in;
            // $rs[$recipe_id]['ingredients'][$ingre_id]['id']= $ingre_id;
            // $rs[$recipe_id]['ingredients'][$ingre_id]['title']= $ingre_title;            
        }
        
        //check ok dish leng result ingredients == default
        $return=[];
        foreach ($rs as $key => $value) {
            # code...
            $lengdish = $this->get_leng_element_in_dish($value['id']);
            
            if($lengdish == sizeof($value['ingredients'])){
                $return[] = $value;
            }
        }

        return $this->json($return);
    }

    
    /**
     * @Route("/best-before/{date}", name="get_bestbefore", methods={"GET"})
    */
    public function get_bestbefore($date)
    {
        $check = $this->check_input_date($date);
        if(!$check['is_check']){
            return $this->json($check);
        }

        $Dish = new Dish();
        $docktrin = $this->getDoctrine();
        $qr = new LunchRespository($docktrin);
        $data = $qr->getdishBestBefore($date);
        $rs = [];
    
        foreach ($data as $key => $value) {            

            $ingre_id = $value ->getidIngredient()->getId();
            $ingre_title = $value ->getidIngredient()->getTitle();
            $ingre_bestBefore = $value ->getidIngredient()->getbestBefore();
            $ingre_userBy = $value ->getidIngredient()->getUseBy();
            $recipe_id = $value ->getidRecipe()->getId();
            $recipe_title = $value ->getidRecipe()->getTitle();
            

            $rs[$recipe_id]['id']= $recipe_id;
            $rs[$recipe_id]['title']= $recipe_title;

            $tem_in = [];
            $tem_in['id'] = $ingre_id;
            $tem_in['title'] = $ingre_title;
            //$tem_in['bestBefore'] = $ingre_bestBefore;
            //$tem_in['userBy'] = $ingre_userBy;
            // $tem_in['bestBefore'] = date("YW", strtotime("2011-01-07"));
            // var_dump($ingre_bestBefore->format('Y-m-d H:i:s'));die;
            $tem_in['bestBefore'] = $ingre_bestBefore->format('Y-m-d');
            $tem_in['userBy'] = $ingre_userBy->format('Y-m-d');
            $rs[$recipe_id]['ingredients'][]= $tem_in;
            // $rs[$recipe_id]['ingredients'][$ingre_id]['id']= $ingre_id;
            // $rs[$recipe_id]['ingredients'][$ingre_id]['title']= $ingre_title;            
        }
        
        //check ok dish leng result ingredients == default
        $return=[];
        foreach ($rs as $key => $value) {
            # code...
            $lengdish = $this->get_leng_element_in_dish($value['id']);
            
            if($lengdish == sizeof($value['ingredients'])){
                $return[] = $value;
            }
        }

        return $this->json($return);
    }


    //not oop
    private function getByConditionInput($type = null,$input = null){


        $Dish = new Dish();
        $docktrin = $this->getDoctrine();
        $qr = new LunchRespository($docktrin);

        switch ($type) {
            case 'all':
                # code...
                break;
            case 'use_by':                   
            case 'best_before':

                $check = $this->check_input_date($date);
                if(!$check['is_check']){
                    return $this->json($check);
                }

                break;
            
            default:
                # code...
                break;
        }


        

        
        $data = $qr->getdishUserBy($date);
        $rs = [];
    
        foreach ($data as $key => $value) {            

            $ingre_id = $value ->getidIngredient()->getId();
            $ingre_title = $value ->getidIngredient()->getTitle();
            $ingre_bestBefore = $value ->getidIngredient()->getbestBefore();
            $ingre_userBy = $value ->getidIngredient()->getUseBy();
            $recipe_id = $value ->getidRecipe()->getId();
            $recipe_title = $value ->getidRecipe()->getTitle();
            

            $rs[$recipe_id]['id']= $recipe_id;
            $rs[$recipe_id]['title']= $recipe_title;

            $tem_in = [];
            $tem_in['id'] = $ingre_id;
            $tem_in['title'] = $ingre_title;
            //$tem_in['bestBefore'] = $ingre_bestBefore;
            //$tem_in['userBy'] = $ingre_userBy;
            // $tem_in['bestBefore'] = date("YW", strtotime("2011-01-07"));
            // var_dump($ingre_bestBefore->format('Y-m-d H:i:s'));die;
            $tem_in['bestBefore'] = $ingre_bestBefore->format('Y-m-d');
            $tem_in['userBy'] = $ingre_userBy->format('Y-m-d');
            $rs[$recipe_id]['ingredients'][]= $tem_in;
            // $rs[$recipe_id]['ingredients'][$ingre_id]['id']= $ingre_id;
            // $rs[$recipe_id]['ingredients'][$ingre_id]['title']= $ingre_title;            
        }
        
        //check ok dish leng result ingredients == default
        $return=[];
        foreach ($rs as $key => $value) {
            # code...
            $lengdish = $this->get_leng_element_in_dish($value['id']);
            
            if($lengdish == sizeof($value['ingredients'])){
                $return[] = $value;
            }
        }

        return $this->json($return);
    }

    private function get_leng_element_in_dish($id){
        
        $docktrin = $this->getDoctrine();
        $qr = new LunchRespository($docktrin);
        $data = $qr->getdishOneByRecipe($id);
       return sizeof($data);
    }

    private function check_input_date($str=null){
        $is_check = false;
        $arr = explode('-',$str);
        if(sizeof($arr)==3){
            $month= $arr[1];
            $day= $arr[2];
            $year= $arr[0];
            $is_check = checkdate($month, $day, $year);
        }
        $rs['msg']=!$is_check? 'format wrong Y-m-d':'';
        $rs['is_check']=$is_check;
        return $rs;
    }
}
