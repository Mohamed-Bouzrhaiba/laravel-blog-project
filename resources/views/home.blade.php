<x-master title="Home">

    <body>
    <style>.hero {
        background: url('https://img.freepik.com/free-vector/blue-background-with-white-line-middle_483537-4470.jpg') no-repeat center center/cover;
        height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        position: relative;
    }

    .hero::before {
        content: "";
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* dark overlay */
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 700px;
        padding: 0 20px;
    }

    .hero h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .hero p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
    }

    .hero-btn {
        background-color: red;
        color: white;
        padding: 0.75rem 1.5rem;
        text-decoration: none;
        border-radius: 25px;
        transition: background-color 0.3s ease;
    }

    .hero-btn:hover {
        background-color: #ff4757;
    }
    </style>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Our Blog</h1>
            <p>Discover stories,tech tutorials, and thoughts from our awesome community.</p>
            <a href="{{route('posts.index')}}" class="hero-btn">Explore Posts</a>
        </div>
    </section>



</x-master>
