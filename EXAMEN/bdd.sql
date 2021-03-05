#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: students
#------------------------------------------------------------

CREATE TABLE students(
        student_id         Int  Auto_increment  NOT NULL ,
        student_first_name Varchar (50) NOT NULL ,
        student_last_name  Varchar (50) NOT NULL ,
        student_email      Varchar (50) NOT NULL ,
        student_password   Varchar (50) NOT NULL ,
        student_key        Int NOT NULL
	,CONSTRAINT students_PK PRIMARY KEY (student_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: teachers
#------------------------------------------------------------

CREATE TABLE teachers(
        teacher_id         Int  Auto_increment  NOT NULL ,
        teacher_first_name Varchar (55) NOT NULL ,
        teacher_last_name  Varchar (55) NOT NULL ,
        teacher_email      Varchar (55) NOT NULL ,
        teacher_password   Varchar (1) NOT NULL ,
        teacher_key        Int NOT NULL
	,CONSTRAINT teachers_PK PRIMARY KEY (teacher_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE message(
        message_id          Int  Auto_increment  NOT NULL ,
        message_date        Date NOT NULL ,
        message_object      Varchar (55) NOT NULL ,
        message_content     Varchar (999) NOT NULL ,
        student_id          Int NOT NULL ,
        message_to          Varchar (55) NOT NULL ,
        teacher_id          Int NOT NULL ,
        student_id_students Int NOT NULL ,
        teacher_id_teachers Int NOT NULL
	,CONSTRAINT message_PK PRIMARY KEY (message_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: course
#------------------------------------------------------------

CREATE TABLE course(
        course_id           Int  Auto_increment  NOT NULL ,
        course_libelle      Varchar (55) NOT NULL ,
        course_module       Varchar (55) NOT NULL ,
        course_categorie    Varchar (2) NOT NULL ,
        teacher_id          Int NOT NULL ,
        teacher_id_teachers Int NOT NULL ,
        note_id             Int NOT NULL
	,CONSTRAINT course_PK PRIMARY KEY (course_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: note
#------------------------------------------------------------

CREATE TABLE note(
        note_id          Int  Auto_increment  NOT NULL ,
        note_value       Int NOT NULL ,
        course_id        Int NOT NULL ,
        student_id       Int NOT NULL ,
        course_id_tolink Int NOT NULL
	,CONSTRAINT note_PK PRIMARY KEY (note_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: toassist
#------------------------------------------------------------

CREATE TABLE toassist(
        course_id  Int NOT NULL ,
        student_id Int NOT NULL
	,CONSTRAINT toassist_PK PRIMARY KEY (course_id,student_id)
)ENGINE=InnoDB;




ALTER TABLE message
	ADD CONSTRAINT message_students0_FK
	FOREIGN KEY (student_id_students)
	REFERENCES students(student_id);

ALTER TABLE message
	ADD CONSTRAINT message_teachers1_FK
	FOREIGN KEY (teacher_id_teachers)
	REFERENCES teachers(teacher_id);

ALTER TABLE course
	ADD CONSTRAINT course_teachers0_FK
	FOREIGN KEY (teacher_id_teachers)
	REFERENCES teachers(teacher_id);

ALTER TABLE course
	ADD CONSTRAINT course_note1_FK
	FOREIGN KEY (note_id)
	REFERENCES note(note_id);

ALTER TABLE course 
	ADD CONSTRAINT course_note0_AK 
	UNIQUE (note_id);

ALTER TABLE note
	ADD CONSTRAINT note_course0_FK
	FOREIGN KEY (course_id_tolink)
	REFERENCES course(course_id);

ALTER TABLE note 
	ADD CONSTRAINT note_course0_AK 
	UNIQUE (course_id_tolink);

ALTER TABLE toassist
	ADD CONSTRAINT toassist_course0_FK
	FOREIGN KEY (course_id)
	REFERENCES course(course_id);

ALTER TABLE toassist
	ADD CONSTRAINT toassist_students1_FK
	FOREIGN KEY (student_id)
	REFERENCES students(student_id);
