<?php
class Admin extends Controller{

    public $MemberModel;
    public $PostModel;
    public function __construct(){
        $this->MemberModel = $this->model("MemberModel");
        $this->PostModel = $this->model("PostModel");
    }
    public function SayHi(){
        $mem = $this->MemberModel->GetAllMember();
        $this->view("masterAdmin", [
            "page"=>"managemem",
            "mem"=>$mem
        ]);
    }
    public function managepost(){
        $post = $this->PostModel->allPost();
        $this->view("masterAdmin", [
            "page"=>"managepost",
            "post"=>$post
        ]);
    }
    public function managehistory(){
        $hist = $this->LogHistoryModel->GetAllHistory();
        $this->view("masterAdmin", [
            "page"=>"managehistory",
            "hist"=>$hist
        ]);
    }
    public function SearchMember(){
        // echo($_GET["keyword"]);
        $mem = $this->MemberModel->SearchMember($_POST['keyword']);
        $this->view("masterAdmin", [
            "page"=>"managemem",
            "mem"=>$mem
        ]);
    }
    public function ShowInfo($idacc){
        $mem = $this->MemberModel->GetSpeMem($idacc);
        $this->view("masterAdmin", [
            "page"=>"admin-user",
            "mem"=>$mem
        ]);
    }
    function ResetPassword(){   
        if(isset($_POST['submit'])){
           
            $newpass = $_POST["newpass"];
            $id = $_POST["id"];           
            $kq = $this->MemberModel->ResetPass($id,$newpass);
            $mem = $this->MemberModel->GetSpeMem($id);
            $this->view("masterAdmin", [
                "page"=>"admin-user",
                "mem"=>$mem,
                "result" => $kq
            ]);
        }
        else{
            $id = $_POST["id"];
            $mem = $this->MemberModel->GetSpeMem($id);
            $this->view("masterAdmin", [
                "page"=>"admin-user",
                "mem"=>$mem
            ]);
        }
    }
    function DelImage(){   
        $pid = $_POST["IdDelImg"];           
        $kq = $this->PostModel->DelPost($pid);
        $post = $this->PostModel->allPost();
        $this->view("masterAdmin", [
            "page"=>"managepost",
            "post"=>$post
        ]);
    }
    


}
    //Cũ
//     //-----------------------------MANAGE MEMBER-------------------------------------------------------
//    public function MemberManage($memPerPage, $page){
//        //mặc định trang 1, mỗi trang có 5 thành viên
//         $this->view("masterAdmin", [
//             "page"=>"managemember",
//             "allmember"=>$this->MemberModel->GetAllMember(),
//             "limitmember" =>$this->MemberModel->GetLimitMember($memPerPage, $page),
//             "curentpage"=>$page,
//             "memperpage" => $memPerPage
//         ]);
//     }
//     public function DeleteMember($id, $memPerPage, $page){
//          $this->MemberModel->DeleteMember($id);
//         //Sau khi xóa trả về kết quả
//         Admin::MemberManage($memPerPage, $page);
//     }
//     function SearchMember($memPerPage, $page){
//         if(isset($_POST["search"]) and isset($_POST["username"])){
//             $username = $_POST["username"];
//             $kq = $this->MemberModel->SearchMember($username);
//             // var_dump($kq);
//             //ko tìm thấy thì load lại trang và trả về in ra dòng ko tìm thấy
//             if($kq == false){
//                 // $result = "Not found!!!";
//                 // echo $kq;
//                 $this->view("masterAdmin", [
//                     "page"=>"managemember",
//                     "curentpage"=>$page,
//                     "memperpage" => $memPerPage,
//                     // "result" => $result
//                 ]);
//             }
//             else{
//                 $limitmember = $this->MemberModel->LimitSearchMember($username,$memPerPage, $page);
//                 $this->view("masterAdmin", [
//                     "page"=>"managemember",
//                     "allmember"=>$kq,
//                     "limitmember" => $limitmember,
//                     "curentpage"=>$page,
//                     "memperpage" => $memPerPage
//                 ]);
//             }
            
//         }
//     }

//     //------------------------------------------MANAGE MUSIC---------------------------------------
//      public function MusicManage($musicPerPage, $page)
//      {
//         $this->view("masterAdmin", [
//             "page"=>"managemusic",
//             "allmusic"=>$this->MusicModel->GetAllMusic(),
//             "limitmusic" =>$this->MusicModel->GetLimitMusic($musicPerPage, $page),
//             "curentpage"=>$page,
//             "musicperpage" => $musicPerPage
//         ]);
//     }
//     public function DeleteMusic($idmusic, $musicPerPage, $page){
//         $this->MusicModel->DeleteMusic($idmusic);
//        //Sau khi xóa trả về kết quả
//        Admin::MusicManage($musicPerPage, $page);
//     }
//     public function SearchMusic($musicPerPage, $page){
//         if(isset($_POST["search"]) and isset($_POST["searchmusic"])){
//             $column = $_POST["column"];
//             $searchmusic = $_POST["searchmusic"];
//             // echo $searchmusic;
//             // echo $column;
//             $kq = $this->MusicModel->SearchMusic($searchmusic,$column);
//             // var_dump($kq);
//             // //ko tìm thấy thì load lại trang và trả về in ra dòng ko tìm thấy
//             if($kq == false){
//                 $result = "Not found!!!";
//                 // echo $kq;
//                 $this->view("masterAdmin", [
//                     "page"=>"managemusic",
//                     "curentpage"=>$page,
//                     "musicperpage" => $musicPerPage,
//                     "result" => $result
//                 ]);
//             }
//             else{
//                 $limitmusic = $this->MusicModel->LimitSearchMusic($searchmusic,$column,$musicPerPage, $page);
//                 $this->view("masterAdmin", [
//                     "page"=>"managemusic",
//                     "allmusic"=>$kq,
//                     "limitmusic" => $limitmusic,
//                     "curentpage"=>$page,
//                     "musicperpage" => $musicPerPage
//                 ]);
//             }
            
//         }
//     }

//     //ACTION
//     function EditMusic($idmusic){   
//         if(isset($_POST['submit'])){
           
//             $songtitle = $_POST["songtitle"];
//             $songlink = $_POST["songlink"];           
//             $idtype = $_POST["idtype"];
//             // $listens = $_POST["listens"];
//             $kq = $this->MusicModel->UpdateMusic($idmusic, $songtitle, $songlink, $idtype);

//             // echo $songtitle;
//             $this->view("masterHome", [
//                 "page" => "edit",
//                 "result" => $kq,
//                 "edit" => $this->MusicModel->Edit($idmusic),
//             ]);
//         }
//         else{
//             $this->view("masterHome", [
//                 "page" => "edit",
//                 "edit" => $this->MusicModel->Edit($idmusic)
//             ]);
//         }
//     }
// }



