<?php

function getSchools($sql){
    $stmt = $sql->prepare('SELECT * FROM schools ORDER BY name');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getSchool($sql, $id){
    $stmt = $sql->prepare('SELECT * FROM schools WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addSchool($sql, $name, $principal, $city, $street, $zip, $idn, $tin){
    $stmt = $sql->prepare('INSERT INTO schools (name, principal, city, street, zip, idn, tin)
    VALUES (?, ?, ?, ?, ?, ?, ?)');
    return $stmt->execute([$name, $principal, $city, $street, $zip, $idn, $tin]);   
}

function editSchool($sql, $name, $principal, $city, $street, $zip, $idn, $tin, $id){
    $stmt = $sql->prepare('UPDATE schools 
    SET name = ?, principal = ?, city = ?, street = ?, zip = ?, idn = ?, tin = ?
    WHERE id = ?');
    return $stmt->execute([$name, $principal, $city, $street, $zip, $idn, $tin, $id]);
}

function deleteSchool($sql, $id, $school_id){
    $stmt = $sql->prepare('DELETE FROM students WHERE school_id = ?');
    $stmt->execute([$id]); 

    $stmt = $sql->prepare('DELETE FROM teachers WHERE school_id = ?');
    $stmt->execute([$id]); 

    $stmt = $sql->prepare('DELETE FROM subjects WHERE school_id = ?');
    $stmt->execute([$id]); 
    
    $stmt = $sql->prepare('DELETE FROM schools WHERE id = ?');
    $stmt->execute([$id]); 

}

function getStudents($sql){
    $stmt = $sql->prepare('SELECT students.*, schools.name AS school_name
    FROM students
    JOIN schools 
    ON students.school_id = schools.id
    ORDER BY name');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getStudentsBySubject($sql){
    $stmt = $sql->prepare('SELECT * FROM students
    JOIN student_subject
    ON students.id = student_subject.student_id
    WHERE student_subject.subject_id = ?');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getStudent($sql, $id){
    $stmt = $sql->prepare('SELECT students.*, schools.name AS school_name
    FROM students 
    JOIN schools
    ON students.school_id = schools.id
    WHERE students.id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addStudent($sql, $name, $surname, $city, $street, $zip, $birth_number, $phone, $school_id){
    $stmt = $sql->prepare('INSERT INTO students (name, surname, city, street, zip, birth_number, phone, school_id)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    return $stmt->execute([$name, $surname, $city, $street, $zip, $birth_number, $phone, $school_id]);   
}

function editStudent($sql, $name, $surname, $city, $street, $zip, $birth_number, $phone, $school_id, $id){
    $stmt = $sql->prepare('UPDATE students
    SET name = ?, surname = ?, city = ?, street = ?, zip = ?, birth_number = ?, phone = ?, school_id = ?
    WHERE id = ?');
    return $stmt->execute([$name, $surname, $city, $street, $zip, $birth_number, $phone, $school_id, $id]);
}

function deleteStudent($sql, $id){
    $stmt = $sql->prepare('DELETE FROM student_subject WHERE student_id = ?');
    $stmt->execute([$id]);

    $stmt = $sql->prepare('DELETE FROM students WHERE id = ?');
    $stmt->execute([$id]);

}

function getTeachers($sql){
    $stmt = $sql->prepare('SELECT teachers.*, schools.name AS school_name
    FROM teachers
    JOIN schools 
    ON teachers.school_id = schools.id
    ORDER BY name');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getTeacher($sql, $id){
    $stmt = $sql->prepare('SELECT teachers.*, schools.name AS school_name
    FROM teachers 
    JOIN schools
    ON teachers.school_id = schools.id
    WHERE teachers.id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getTeachersBySubject($sql){
    $stmt = $sql->prepare('SELECT * FROM teachers
    JOIN teacher_subject
    ON teachers.id = teacher_subject.teacher_id
    WHERE teacher_subject.subject_id = ?');
    $stmt->execute();
    return $stmt->fetchAll();
}

function addTeacher($sql, $name, $surname, $city, $street, $zip, $birth_number, $phone, $inter_number, $school_id){
    $stmt = $sql->prepare('INSERT INTO teachers (name, surname, city, street, zip, birth_number, phone, inter_number, school_id)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    return $stmt->execute([$name, $surname, $city, $street, $zip, $birth_number, $phone, $inter_number, $school_id]);   
}

function editTeacher($sql, $name, $surname, $city, $street, $zip, $birth_number, $phone, $inter_number, $school_id, $id){
    $stmt = $sql->prepare('UPDATE teachers
    SET name = ?, surname = ?, city = ?, street = ?, zip = ?, birth_number = ?, phone = ?, inter_number = ?, school_id = ?
    WHERE id = ?');
    return $stmt->execute([$name, $surname, $city, $street, $zip, $birth_number, $phone, $inter_number, $school_id, $id]);
}

function deleteTeacher($sql, $id){
    $stmt = $sql->prepare('DELETE FROM teacher_subject WHERE teacher_id = ?');
    $stmt->execute([$id]);

    $stmt = $sql->prepare('DELETE FROM teachers WHERE id = ?');
    $stmt->execute([$id]);
}

function getSubjects($sql){
    $stmt = $sql->prepare('SELECT subjects.*, schools.name AS school_name
    FROM subjects
    JOIN schools 
    ON subjects.school_id = schools.id
    ORDER BY name');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getSubjectsBySchool($sql, $school_id){
    $stmt = $sql->prepare('SELECT * FROM subjects
    WHERE school_id = ?
    ORDER BY name');
    $stmt->execute();
    return $stmt->fetchAll();

}

function getSubject($sql, $id){
    $stmt = $sql->prepare('SELECT subjects.*, schools.name AS school_name
    FROM subjects 
    JOIN schools
    ON subjects.school_id = schools.id
    WHERE subjects.id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addSubject($sql, $name, $description, $school_id){
    $stmt = $sql->prepare('INSERT INTO subjects (name, description, school_id)
    VALUES (?, ?, ?)');
    return $stmt->execute([$name, $description, $school_id]);   
}

function editSubject($sql, $name, $description, $school_id, $id){
    $stmt = $sql->prepare('UPDATE subjects
    SET name = ?, description = ?, school_id = ?
    WHERE id = ?');
    return $stmt->execute([$name, $description, $school_id, $id]);
}

function deleteSubject($sql, $id){
    $stmt = $sql->prepare('DELETE FROM student_subject WHERE subject_id = ?');
    $stmt->execute([$id]);

    $stmt = $sql->prepare('DELETE FROM teacher_subject WHERE subject_id = ?');
    $stmt->execute([$id]);

    $stmt = $sql->prepare('DELETE FROM subjects WHERE id = ?');
    $stmt->execute([$id]);
}

function addStudentSubject($sql, $student_id, $subject_id){
    $stmt = $sql->prepare('INSERT IGNORE INTO student_subject (student_id, subject_id)
    VALUES (?, ?)');
    $stmt->execute([$student_id, $subject_id]);
}

function addTeacherSubject($sql, $teacher_id, $subject_id){
    $stmt = $sql->prepare('INSERT IGNORE INTO teacher_subject (teacher_id, subject_id)
    VALUES (?, ?)');
    $stmt->execute([$teacher_id, $subject_id]);
}

function getSubjectsOfSchool($sql, $school_id){
    $stmt = $sql->prepare('SELECT *
    FROM subjects 
    WHERE school_id = ?');
    $stmt->execute([$school_id]);
    return $stmt->fetchAll();
}

function getStudentsOfSubject($sql, $subject_id){
    $stmt = $sql->prepare('SELECT *
    FROM students
    JOIN student_subject
    ON students.id = student_subject.student_id
    WHERE subject_id = ?');
    $stmt->execute([$subject_id]);
    return $stmt->fetchAll();
}

function getTeachersOfSubject($sql, $subject_id){
    $stmt = $sql->prepare('SELECT *
    FROM teachers
    JOIN teacher_subject
    ON teachers.id = teacher_subject.teacher_id
    WHERE subject_id = ?');
    $stmt->execute([$subject_id]);
    return $stmt->fetchAll();
}
