# <h1 align=center><a name="0">**OWLY**</a></h1>

<details>
  <summary>Menù</summary>
 <ol>
   <li><a href="#1">About The Project</a></li>
  <li><a href="#2">Built With</a></li>
  <li><a href="#3">Usage</a></li>
  <li><a href="#4">Contact</a></li>
 </ol>
</details>

### <a name="1">About The Project</a>

<br/>
<img src="resources\img\img_json.jpg" width="30%">

<p align=right><a href="#0">back to top</a></p>

---

### <a name="2">Built With</a>

- [PHP](https://www.w3schools.com/php/)
- [MySql](https://www.w3schools.com/MySQL/default.asp)

<p align=right><a href="#0">back to top</a></p>

---

### <a name="3">Usage</a>

1.  Install Composer packages
    ```sh
    composer install
    ```
2.  Install migrations.sql file:
    Run `php artisan migrate`.

3.  Open `.env` and configure the file to allow a connection to the database.

    ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=owly_db
    DB_USERNAME=root
    DB_PASSWORD=password
    ```
4. Run `php artisan serve`.
5.  Show all the course in your localhost.

    ```sh
    http://127.0.0.1:8000/api/course
    ```

6.  Show all the course's subjects in your localhost.

    ```sh
    http://127.0.0.1:8000/api/subjects
    ```
7.  To work with database install `Postman Desktop Agent` and run it.
    Add `Content-Type:application/json` in Headers.
    In Body select raw.
    
    <br/>
    <br/>
<!-- COURSE -->
##### <h4 align=center>COURSE</h4>
***

- **Read course**:
  <br/>
  Send an HTTP `GET` request to the URL:

```sh
<yourdomain>/api/course
```

- **Update course**:
  <br/>

1. Send an HTTP `PUT` request to the URL:

```sh
 <yourdomain>/api/course/<id>
```

2.  In Body section:

```sh
    {
    "name_course":":new name",
    "places_available":":new places"
    }
```

- **Create course**:
   <br/>

1. Send an HTTP `POST` request to the URL:

    ```sh
    <yourdomain>/api/course
    ```

2. In Body section:
    
    ```sh
    {
    "name_course":":name",
    "places_available":":places"
    } 
    ```

- **Delete course**:
    <br/>
1. Send an HTTP `DELETE` request to the URL:
```sh
     <yourdomain>/api/course/<name-of-course>
 ```

 <br/>
 <br/>
<!--SUBJECT-->

 ##### <h4 align=center>SUBJECTS</h4>
***

- **Read subjects**:
  <br/>
  Send an HTTP `GET` request to the URL:

 ```sh
  <yourdomain>/api/subjects
```

- **Update subject**:
  <br/>

1. Send an HTTP `PUT` request to the URL:

  ```sh
  <yourdomain>/api/subjects/<id>
  ```

2. In Body section:

  ```sh
  {
  "course_id":":new course_id",
  "name":":new name"
  }
  ```

- **Create subject**:
  <br/>

1. Send an HTTP `POST` request to the URL:

  ```sh
  <yourdomain>/api/subjects
  ```

2. To assign subject to course `course.id===subjects.course_id`
3. In Body section:

  ```sh
  {
  "course_id":":course_id",
  "name":":name"
  }
  ```

- **Delete subject**:
    <br/>

1. Send an HTTP `DELETE` request to the URL:

  ```sh
  <yourdomain>/api/subjects/<id>
  ```

<br/>
<br/>
  <!-- filter course -->

##### <h4 align=center>FILTER</h4>
***

- **By name**:
  <br/>

1. Send an HTTP `POST` request to the URL:

  ```sh
  <yourdomain>/api/filter/name=<name-of-course>
  ```


- **By subject**:
    <br/>

1. Send an HTTP `POST` request to the URL:

  ```sh
  <yourdomain>/api/filter/subject=<name-of-subject>
  ```


- **By places available**:
    <br/>

1. Send an HTTP `POST` request to the URL:

  ```sh
  <yourdomain>/api/filter/places=<number-of-places>
  ```


<br/>
<br/>

<p align=right><a href="#0">back to top</a></p>

---

### <a name="4">Contact</a>

William - verga.william.95@gmail.com

Project Link: [https://github.com/William-95/owly](https://github.com/William-95/owly)

<p align=right><a href="#0">back to top</a></p>
 
