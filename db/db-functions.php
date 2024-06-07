<?php
  
    /**
     * Add User to Users Table
     * 
     * @param \PDO $conn
     * @param string $fullname
     * @param string $email
     * @param string $hashPassword
     * @param string $city
     * @return bool
     */
    function addUser(\PDO $conn, string $fullname, string $email, string $hashPassword,  string $city = ''): bool {
        $sql = "INSERT INTO users (fullname, email, password, city) VALUES (?, ?, ?, ?)";
        $q = $conn->prepare($sql);
        $insert = $q->execute([
            $fullname,
            $email,
            $hashPassword,
            $city
        ]);

        return $insert;
    }

    /**
     * Has this email been received before? We are checking this.
     * 
     * @param \PDO $conn
     * @param string $email
     * @return bool
     */
    function hasUserEmail(\PDO $conn, string $email): bool {
        $sql = "SELECT email FROM users WHERE email = ?";
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
    function getSingleUserInfo(\PDO $conn, string $email): mixed {
        $sql = "SELECT * FROM users WHERE email = ?";
        $q = $conn->prepare($sql);
        $q->execute([
            $email
        ]);

        return $q->rowCount() > 0 ? $q->fetch(PDO::FETCH_ASSOC) : [];
    }

    /**
     * Get Six Job Postings
     * 
     * @param \PDO $conn
     * @return array
     */
    function getSixJobPostings(\PDO $conn): array {
        $sql = "SELECT * FROM job_listings ORDER BY created_at DESC LIMIT 6";
        $q = $conn->prepare($sql);
        $q->execute();
        $jobPostings = $q->fetchAll(PDO::FETCH_ASSOC);
        
        return $q->rowCount() > 0 ? $jobPostings : [];
    }

    /**
     * Get All Job Postings
     * 
     * @param \PDO $conn
     * @return array
     */
    function getAllJobPostings(\PDO $conn): array {
        $sql = "SELECT * FROM job_listings ORDER BY created_at DESC";
        $q = $conn->prepare($sql);
        $q->execute();
        $jobPostings = $q->fetchAll(PDO::FETCH_ASSOC);
        
        return $q->rowCount() > 0 ? $jobPostings : [];
    }

    /**
     * Add Job Posting
     * 
     * @param \PDO $conn
     * @param int $userId,
     * @param string $jobTitle,
     * @param string $jobDescription,
     * @param string $jobSalary,
     * @param string $jobTags,
     * @param string $jobCompanyName,
     * @param string $jobCity,
     * @param string $jobEmail,
     * @param string $jobRequirements,
     * @param string $jobBenefits,
     * @param string $jobAddress,
     * @param string $jobPhone
     * @return bool
     */
    function addJobPosting(\PDO $conn, int $userId, string $jobTitle, string $jobDescription, string $jobSalary, string $jobTags, string $jobCompanyName, string $jobCity, string $jobEmail, string $jobRequirements = '', string $jobBenefits = '', string $jobAddress = '', string $jobPhone = ''): bool {
        $sql = "INSERT INTO job_listings (user_id, title, description, salary, tags, company, city, email, requirements, benefits, address, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $q = $conn->prepare($sql);
        $insert = $q->execute([
            $userId,
            $jobTitle,
            $jobDescription,
            $jobSalary,
            $jobTags,
            $jobCompanyName,
            $jobCity,
            $jobEmail,
            $jobRequirements,
            $jobBenefits,
            $jobAddress,
            $jobPhone
        ]);

        return $insert;
    }

    /**
     * Get Single Job Posting
     * 
     * @param \PDO $conn
     * @param int $jobId
     * @return array
     */
    function getSingleJobPosting(\PDO $conn, int $jobId): array {
        $sql = "SELECT * FROM job_listings WHERE id = ?";
        $q = $conn->prepare($sql);
        $q->execute([
            $jobId
        ]);
        $jobPosting = $q->fetch(PDO::FETCH_ASSOC);

        return $q->rowCount() > 0 ? $jobPosting : [];
    }

    /**
     * Edit Job Posting
     * 
     * @param \PDO $conn
     * @param int $jobId,
     * @param string $jobTitle
     * @param string $jobDescription
     * @param string $jobSalary
     * @param string $jobTags
     * @param string $jobCompanyName
     * @param string $jobCity
     * @param string $jobEmail
     * @param string $jobRequirements
     * @param string $jobBenefits
     * @param string $jobAddress
     * @param string $jobPhone
     * @return bool
     */
    function editJobPosting(\PDO $conn, int $jobId, string $jobTitle, string $jobDescription, string $jobSalary, string $jobTags, string $jobCompanyName, string $jobCity, string $jobEmail, string $jobRequirements = '', string $jobBenefits = '', string $jobAddress = '', string $jobPhone = ''): bool {

        $sql = "UPDATE job_listings SET title=:title, description=:description, salary=:salary, tags=:tags, company=:company, city=:city, email=:email, requirements=:requirements, benefits=:benefits, address=:address, phone=:phone WHERE id=:id";

        $q = $conn->prepare($sql);
        $q->execute([
            "title" => $jobTitle,
            "description" => $jobDescription,
            "salary" => $jobSalary,
            "tags" => $jobTags,
            "company" => $jobCompanyName,
            "city" => $jobCity,
            "email" => $jobEmail,
            "requirements" => $jobRequirements,
            "benefits" => $jobBenefits,
            "address" => $jobAddress,
            "phone" => $jobPhone,
            "id" => $jobId
        ]);

        return $q->rowCount() > 0 ? true : false;
    }

    /**
     * Delete Job Posting
     * 
     * @param \PDO $conn
     * @param int $jobId
     * @return bool
     */
    function deleteJobPosting(\PDO $conn, int $jobId): bool {
        $sql = "DELETE FROM job_listings WHERE id=:id";
        $q = $conn->prepare($sql);
        $q->execute([
            "id" => $jobId
        ]);

        return $q->rowCount() > 0 ? true : false;
    }

    /**
     * Find Job Posting By Keys
     * 
     * @param \PDO $conn
     * @param string $keyword
     * @param string $location
     * @return array
     */
    function findJobPostingByKeys(\PDO $conn, string $keyword, string $location): array {
        $sql = "SELECT * FROM job_listings WHERE title LIKE :keyword AND city LIKE :location ";
        $q = $conn->prepare($sql);
        $q->execute([
            ":keyword" => '%' . $keyword . '%',
            ":location" => '%' . $location . '%'
        ]);
        $data = $q->fetchAll(PDO::FETCH_ASSOC);

        return $q->rowCount() > 0 ? $data : [];
    }

?>