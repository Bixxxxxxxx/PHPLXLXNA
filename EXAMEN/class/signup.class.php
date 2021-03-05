<?php

include_once 'database.class.php';

class StudentModel extends Dbh{
    public $first_name;
    public $last_name;
    public $email_student;
    public $password_student;
    public $admin;

    public function VerifyStudent(string $email_student){
        $sql = "SELECT * FROM students WHERE student_email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email_student]);
        $count = $stmt->rowCount();
        if ($count < 1){
            return TRUE;
        }
        else{
            return FALSE;
        }


    }
    public function SetStudent(string $first_name, string $last_name, string $email_student, string $password_student){
        if ($this->VerifyStudent($email_student)){
            $sql = "INSERT INTO students (student_last_name, student_first_name, student_email, student_password, student_key) VALUES (?,?,?,?,?) ";
        $stmt = $this->connect()->prepare($sql);
        $this->admin = 0;
        $stmt->execute([$last_name, $first_name, $email_student,$password_student,$this->admin]);
        $resultat = $stmt->fetchAll();
        return TRUE;
        }
        else{
            header("location: ../signup.php?error=2");
            return FALSE;
        }
       }


    public function SetLoginStudent($email_student, $password_student){
        $sql = "SELECT * FROM students WHERE student_email = ? AND student_password = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email_student, $password_student]);
        $count = $stmt->rowCount();
        $resultat = $stmt->fetchAll();

        if ($count < 1){
            header('location: ../login.php?error=votrecomptedonotexiste');
            return FALSE;
        }
        else if ($count > 0){
            if (!isset($_SESSION['login'])){
                session_start();
                $_SESSION['login'] = TRUE;
                $_SESSION["student_email"] = $email_student;
                $_SESSION["student_key"] = $resultat[0]['student_key'];
                 
                echo "koko";
                ###echo $_SESSION["student_key"];
                return TRUE;
            }

            else{
                
                session_unset();
                session_destroy();
                session_start();
                $_SESSION['login'] = TRUE;
                $_SESSION["student_email"] = $email_student;
                $_SESSION["student_key"] = $resultat[0]['student_key'];
                 
                echo "koko";
                ###echo $_SESSION["student_key"];
                ###header('location: ../login.php?error=deuxiemattempps');
                return TRUE;
                

            }
            
        }
        else{
            
            header('location: ../login.php?error=fako');
        }
    }
}









class AdminModel extends Dbh {

    public $first_name;
    public $last_name;
    public $email_teacher;
    public $password_teacher;
    public $admin;




    public function VerifyTeacher(string $email_teacher){
        $sql = "SELECT * FROM teachers WHERE teacher_email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email_teacher]);
        $count = $stmt->rowCount();
        if ($count < 1){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }


    public function SetAdmin(string $first_name, string $last_name, string $email_teacher, string $password_teacher){
        if ($this->VerifyTeacher($email_teacher) == FALSE){
           
            return FALSE;
            header("location: ../signup.admin.php?error=efa misy");
            exit();
        }
        else if ($this->VerifyTeacher($email_teacher)){
            
                $sql = "INSERT INTO teachers (teacher_last_name, teacher_first_name, teacher_email, teacher_password, teacher_key) VALUES (?,?,?,?,?) ";
            $stmt = $this->connect()->prepare($sql);
            $this->admin = 1;
            $stmt->execute([$last_name, $first_name, $email_teacher,$password_teacher,$this->admin]);
            $resultat = $stmt->fetchAll();
            return TRUE;
        }
        else{
            return false;
        }
    }


    public function SetLoginAdmin($email_teacher,$password_teacher){
        $sql = "SELECT * FROM teachers WHERE teacher_email = ? AND teacher_password = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email_teacher,$password_teacher]);
        $count = $stmt->rowCount();
        $resultat = $stmt->fetchAll();

        if ($count < 1){
            header('location: ../login.php?error=votrecomptedonotexiste');
            return FALSE;
        }
        else if ($count > 0){
            if (!isset($_SESSION['login'])){
                session_start();
                $_SESSION['login'] = TRUE;
                $_SESSION["teacher_email"] = $email_teacher;
                $_SESSION["teacher_key"] = $resultat[0]['teacher_key'];
                 
                echo "koko";
                ###echo $_SESSION["student_key"];
                return TRUE;
            }

            else{
                
                session_unset();
                session_destroy();
                session_start();
                $_SESSION['login'] = TRUE;
                $_SESSION["teacher_email"] = $email_teacher;
                $_SESSION["teacher_key"] = $resultat[0]['teacher_key'];
                 
                ###echo $_SESSION["student_key"];
                ###header('location: ../login.php?error=deuxiemattempps');
                return TRUE;
                
            }
        }
        else{
            
            header('location: ../login.php?error=fako');
        }
    }
}















class NoteModel extends Dbh{
        public $note_course;
        public $note_value;

        public function IdNote(string $note_course){
                $sql = "SELECT course_id FROM course WHERE course_libelle = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$note_course]);
                $count = $stmt->rowCount();
                if ($count < 1){
                    return FALSE;
                    header('location: ../note.insert.php?error=tsisbdd');
                }
                else{
                    $resultat = $stmt->fetchAll();
                    return $resultat;
                }
        
            
        
        }

        public function VerifyIfId($email_student){
                $sql = "SELECT student_id FROM students WHERE student_id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$email_student]);
                $count = $stmt->rowcount();
                if ($count < 0){
                    return FALSE;
                }
                else{
                    $resultat = $stmt->fetchall();
                    return $resultat;
                }
        }

        public function NameIntoId($email_student){
            if ($this->VerifyIfId($email_student) == FALSE){
                $sql = "SELECT student_id FROM students WHERE student_email = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$email_student]);
                $count = $stmt->rowCount();
                if ($count < 1){
                    return FALSE;
                    header('location: ../note.php?error=tsisyanioankizyzo');
                }
                else{
                    $resultat = $stmt->fetchall();
                    return $resultat;
                }
            }
            else{
                    return $this->VerifyIfId($email_student);
                }
            }
                
        

        public function SetNote(string $note_course, int $note_value, $email_student){
            if ($this->IdNote($note_course)){
                if ($this->NameIntoId($email_student)){
                    $resultat1 = $this->IdNote($note_course);
                    $resultat2 = $this->NameIntoId($email_student);
                    $sql = "INSERT INTO note (note_value, course_id, student_id) VALUES (?,?,?)";
                    $stmt = $this->connect()->prepare($sql);
                    $stmt->execute([$note_value, $resultat1[0]['course_id'], $resultat2[0]['student_id']]);
                    $count = $stmt->rowCount();
                    return TRUE;
                }
                
            }
            else{
                return FALSE;
                header('location: ../note.insert.php?error=noteerror32');
            }
        


        
        }
    
/*public function GetStudentName($student_id){
            $sql = "SELECT"
        }
        public function GetNote($student_id)
            $sql = "SELECT S.`student_first_name`, S.`student_last_name`, N.`note_value`, "
                

        }*/


















class CourseModel extends Dbh{
    public $course_libelle;
    public $course_module;
    public $course_categorie;



            public function CourseVerify(string $course_libelle){
                $sql = "SELECT * FROM course WHERE course_libelle = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$course_libelle]);
                $count = $stmt->rowCount();
                if ($count < 1){
                    return TRUE;
                    
                }
                else{
                    return FALSE;
                }       
            }
            

            public function VerifyIfIdProf($email_teacher){
                $sql = "SELECT teacher_id FROM teachers WHERE teacher_id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$email_teacher]);
                $count = $stmt->rowcount();
                if ($count < 0){
                    return FALSE;
                }
                else{
                    $resultat = $stmt->fetchall();
                    return $resultat;
                }
        }

        public function NameIntoIdProf($email_teacher){
            if ($this->VerifyIfIdProf($email_teacher) == FALSE){
                $sql = "SELECT teacher_id FROM students WHERE teacher_email = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$email_teacher]);
                $count = $stmt->rowCount();
                if ($count < 1){
                    return FALSE;
                    header('location: ../note.php?error=tsisyleprof');
                }
                else{
                    $resultat = $stmt->fetchall();
                    return $resultat;
                }
            }
            else{
                
                    return $this->VerifyIfIdProf($email_teacher);
                }
            }
                
        


            public function SetCourse($course_libelle, $course_module, $course_categorie, $email_teacher){
                if ($this->CourseVerify($course_libelle)){
                    if ($this->NameIntoIdProf($email_teacher)){
                        $resultat2 = $this->NameIntoIdProf($email_teacher);
                        $sql = "INSERT INTO course (course_libelle, course_module, course_categorie, teacher_id) VALUES (?,?,?,?)";
                        $stmt = $this->connect()->prepare($sql);
                        $stmt->execute([$course_libelle, $course_module, $course_categorie, $resultat2[0]['teacher_id']]);
                        return TRUE;
                    }

                }
                else{
                    return FALSE;
                }               
            }

            public function GetCourse(){
                $sql = "SELECT * FROM course";
                $stmt = $this->connect()->query($sql);
                $count = $stmt->rowCount();
                return $stmt;
            }
}

