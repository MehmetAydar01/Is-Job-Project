<?php

    /**
     * Has admin email?
     * 
     * @param \PDO $conn
     * @param string $email
     * @return bool
     */
    function hasAdminUserEmail(\PDO $conn, string $email): bool {
        $sql = "SELECT email FROM admin_users WHERE email = ?";
        $q = $conn->prepare($sql);
        $q->execute([
            $email
        ]);

        return $q->rowCount() > 0 ? true : false;
    }

    /**
     * Get Single User Info
     * 
     * @param \PDO $conn
     * @param string $email
     * @return mixed
     */
    function getAdminUserInfo(\PDO $conn, string $email): mixed {
        $sql = "SELECT * FROM admin_users WHERE email = ?";
        $q = $conn->prepare($sql);
        $q->execute([
            $email
        ]);

        return $q->rowCount() > 0 ? $q->fetch(PDO::FETCH_ASSOC) : [];
    }

    /**
     * Get All Users
     * 
     * @param \PDO $conn
     * @return array
     */
    function getAllUsers(\PDO $conn): array {
        $sql = "SELECT * FROM users";
        $q = $conn->prepare($sql);
        $q->execute();
        $data = $q->fetchAll(PDO::FETCH_ASSOC);

        return $data ?? [];
    }

    /**
     * Create User
     * 
     * @param \PDO $conn
     * @param string $fullname
     * @param string $email
     * @param string $city
     * @param string $password
     * @return bool
     */
    function createUser(\PDO $conn, string $fullname, string $email, string $city, string $password): bool {
        $sql = "INSERT INTO users SET fullname=:fullname, email=:email, city=:city, password=:password";
        $q = $conn->prepare($sql);
        $insert = $q->execute([
            "fullname" => $fullname,
            "email" => $email,
            "city" => $city,
            "password" => $password
        ]);

        return $insert;
    }

    /**
     * Get Single User Info
     * 
     * @param \PDO $conn
     * @param int $userId
     * @return mixed
     */
    function getSingleUserById(\PDO $conn, int $userId): mixed {
        $sql = "SELECT * FROM users WHERE id = ?";
        $q = $conn->prepare($sql);
        $q->execute([
            $userId
        ]);

        return $q->rowCount() > 0 ? $q->fetch(PDO::FETCH_ASSOC) : [];
    }

    /**
     * Edit User
     * 
     * @param \PDO $conn
     * @param int $userId
     * @param string $fullname
     * @param string $email
     * @param string $city
     * @param string $password
     * @return bool
     */
    function editUser(\PDO $conn, int $userId, string $fullname, string $email, string $city, string $password): bool {
        $sql = "UPDATE users SET fullname=:fullname, email=:email, city=:city, password=:password WHERE id=:id";
        $q = $conn->prepare($sql);
        $update = $q->execute([
            "fullname" => $fullname,
            "email" => $email,
            "city" => $city,
            "password" => $password,
            "id" => $userId
        ]);

        return $update;
    }

    /**
     * Delete User
     * 
     * @param \PDO $conn
     * @param int $userId
     * @return bool
     */
    function deleteUserById(\PDO $conn, int $userId): bool {
        $sql = "DELETE FROM users WHERE id=:id";
        $q = $conn->prepare($sql);
        $delete = $q->execute([
            "id" => $userId
        ]);

        return $delete;
    }

    /**
     * Get All Postings
     * 
     * @param \PDO $conn
     * @return array
     */
    function getAllPostings(\PDO $conn): array {
        $sql = "SELECT * FROM job_listings";
        $q = $conn->prepare($sql);
        $q->execute();
        $data = $q->fetchAll(PDO::FETCH_ASSOC);

        return $data ?? [];
    }

    /**
     * Create Posting
     * 
     * @param \PDO $conn
     * @param int $userId,
     * @param string $title,
     * @param string $description,
     * @param string $salary,
     * @param string $tags,
     * @param string $company,
     * @param string $city,
     * @param string $email,
     * @param string $requirements,
     * @param string $benefits,
     * @param string $address,
     * @param string $phone
     * @return bool
     */
    function createPosting(\PDO $conn, int $userId, string $title, string $description, string $salary, string $tags, string $company, string $city, string $email, string $requirements = '', string $benefits = '', string $address = '', string $phone = ''): bool {
        $sql = "INSERT INTO job_listings (user_id, title, description, salary, tags, company, city, email, requirements, benefits, address, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $q = $conn->prepare($sql);
        $insert = $q->execute([
            $userId,
            $title,
            $description,
            $salary,
            $tags,
            $company,
            $city,
            $email,
            $requirements,
            $benefits,
            $address,
            $phone
        ]);

        return $insert;
    }

    /**
     * Get Single Posting
     * 
     * @param \PDO $conn
     * @param int $jobId
     * @return array
     */
    function getSinglePostingById(\PDO $conn, int $jobId): array {
        $sql = "SELECT * FROM job_listings WHERE id = ?";
        $q = $conn->prepare($sql);
        $q->execute([
            $jobId
        ]);
        $jobPosting = $q->fetch(PDO::FETCH_ASSOC);

        return $q->rowCount() > 0 ? $jobPosting : [];
    }

    /**
     * Edit Posting
     * 
     * @param \PDO $conn
     * @param int $jobId,
     * @param string $title
     * @param string $description
     * @param string $salary
     * @param string $tags
     * @param string $company
     * @param string $city
     * @param string $email
     * @param string $requirements
     * @param string $benefits
     * @param string $address
     * @param string $phone
     * @return bool
     */
    function editPosting(\PDO $conn, int $jobId, string $title, string $description, string $salary, string $tags, string $company, string $city, string $email, string $requirements = '', string $benefits = '', string $address = '', string $phone = ''): bool {

        $sql = "UPDATE job_listings SET title=:title, description=:description, salary=:salary, tags=:tags, company=:company, city=:city, email=:email, requirements=:requirements, benefits=:benefits, address=:address, phone=:phone WHERE id=:id";

        $q = $conn->prepare($sql);
        $q->execute([
            "title" => $title,
            "description" => $description,
            "salary" => $salary,
            "tags" => $tags,
            "company" => $company,
            "city" => $city,
            "email" => $email,
            "requirements" => $requirements,
            "benefits" => $benefits,
            "address" => $address,
            "phone" => $phone,
            "id" => $jobId
        ]);

        return $q->rowCount() > 0 ? true : false;
    }

    /**
     * Delete Posting
     * 
     * @param \PDO $conn
     * @param int $jobId
     * @return bool
     */
    function deletePostingById(\PDO $conn, int $jobId): bool {
        $sql = "DELETE FROM job_listings WHERE id=:id";
        $q = $conn->prepare($sql);
        $delete = $q->execute([
            "id" => $jobId
        ]);

        return $delete;
    }

?>
