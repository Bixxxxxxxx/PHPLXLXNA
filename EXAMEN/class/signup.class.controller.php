<?php 

include_once "signup.class.php";


class StudentController extends StudentModel{

    public function CreateStudent(string $first_name, string $last_name, string $email_student, string $password_student){
            if ($this->SetStudent($first_name,$last_name, $email_student,$password_student) == TRUE){
                $this->SetStudent($first_name,$last_name, $email_student,$password_student);
                header("location: ../signup.php?error=createstudentwork ");
                return TRUE;
            }
            else{
                header("location: ../signup.php?error=1");
                return FALSE;
            }

    }

    public function LoginStudent($email_student, $password_student){
        if ($this->SetLoginStudent($email_student, $password_student) == TRUE){
            $this->SetLoginStudent($email_student, $password_student);
            return TRUE;
        }
        else{
            return FALSE;
        }

    }



}


class AdminController extends AdminModel{
    public function CreateAdmin(string $first_name, string $last_name, string $email_teacher, string $password_teacher){
        if ($this->SetAdmin($last_name, $first_name, $email_teacher,$password_teacher) == TRUE){
            $this->SetAdmin($last_name, $first_name, $email_teacher,$password_teacher);
            header("location: ../signup.admin.php?error=createAdminwork");
            return TRUE;

        }

        else{
            header("location: ../signup.admin.php?error=EFAMISY");
            return FALSE;
        }
    }

    public function LoginAdmin($email_teacher, $password_teacher){
        if ($this->SetLoginAdmin($email_teacher, $password_teacher) == TRUE){
            $this->SetLoginAdmin($email_teacher, $password_teacher);
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

}


class NoteController extends NoteModel{
    public function CreateNote(string $note_course, int $note_value, $email_student){
        if ($this->SetNote($note_course, $note_value, $email_student) == TRUE){
            $this->SetNote($note_course, $note_value, $email_student);
            return TRUE;
        }
        else{
            return FALSE;
            header("location: ../note.insert.php?error=NoteError2");
           
        }
    }

}



class CourseController extends CourseModel{
    public function CreateCourse($course_libelle, $course_module, $course_categorie, $email_teacher){
        if ($this->SetCourse($course_libelle, $course_module, $course_categorie, $email_teacher)){
            $this->SetCourse($course_libelle, $course_module, $course_categorie, $email_teacher);
            return TRUE;
        }
        else{
            return FALSE;
            header("location: ../course.insert.php?error=CourseError2");
        }
    }


    public function ShowCourse(){
        if ($this->GetCourse()){
            return $this->GetCourse();
        }
        else {
            return false;
            header("location: ../course.php?error=CourseError2");
        }
    }
}
