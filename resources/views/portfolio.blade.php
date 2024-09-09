<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $name ?? 'Your Name' }} - Portfolio</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
  <nav class="bg-gray-800 p-4 sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center">
      <a href="#" class="text-white font-bold text-xl">{{ $name ?? 'Your Name' }}</a>
      <div class="hidden md:flex space-x-4">
        <a href="#about" class="text-gray-300 hover:text-white">About</a>
        <a href="#projects" class="text-gray-300 hover:text-white">Projects</a>
        <a href="#skills" class="text-gray-300 hover:text-white">Skills</a>
        <a href="#contact" class="text-gray-300 hover:text-white">Contact</a>
      </div>
      <button class="md:hidden text-white focus:outline-none">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
    </div>
  </nav>

  <header id="home" class="bg-gray-900 text-white py-20">
    <div class="container mx-auto text-center">
      <h1 class="text-5xl font-bold mb-4">{{ $name ?? 'Your Name' }}</h1>
      <p class="text-xl mb-8">{{ $title ?? 'Web Developer & Designer' }}</p>
      <a href="#contact" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300">Get In Touch</a>
    </div>
  </header>

  <main class="container mx-auto mt-8 px-4">
    <section id="about" class="mb-16">
      <h2 class="text-3xl font-bold mb-4">About Me</h2>
      <p class="text-gray-700 leading-relaxed">
        {{ $about ?? 'I am a passionate web developer with a keen eye for design and a love for creating intuitive, user-friendly websites. With several years of experience in both front-end and back-end development, I strive to build applications that not only look great but also provide seamless functionality.' }}
      </p>
    </section>

    <section id="projects" class="mb-16">
      <h2 class="text-3xl font-bold mb-4">My Projects</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($projects ?? [] as $project)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="{{ $project['image'] ?? '/placeholder.svg' }}" alt="{{ $project['title'] }}" class="w-full h-48 object-cover">
          <div class="p-4">
            <h3 class="font-bold text-xl mb-2">{{ $project['title'] }}</h3>
            <p class="text-gray-700 mb-4">{{ $project['description'] }}</p>
            <a href="{{ $project['link'] }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">View Project</a>
          </div>
        </div>
        @empty
        <p class="text-gray-700">No projects to display.</p>
        @endforelse
      </div>
    </section>

    <section id="skills" class="mb-16">
      <h2 class="text-3xl font-bold mb-4">My Skills</h2>
      <div class="flex flex-wrap gap-4">
        @forelse ($skills ?? [] as $skill)
        <span class="bg-gray-200 rounded-full px-4 py-2 text-sm font-semibold text-gray-700">{{ $skill }}</span>
        @empty
        <p class="text-gray-700">No skills to display.</p>
        @endforelse
      </div>
    </section>

    <section id="contact" class="mb-16">
      <h2 class="text-3xl font-bold mb-4">Contact Me</h2>
      @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
      </div>
      @endif
      <form action="#" method="POST" class="max-w-lg mx-auto">
        @csrf
        <div class="mb-4">
          <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
          <input type="text" id="name" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('name')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
          <input type="email" id="email" name="email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @error('email')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-4">
          <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message:</label>
          <textarea id="message" name="message" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-32"></textarea>
          @error('message')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
            Send Message
          </button>
        </div>
      </form>
    </section>
  </main>

  <footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto text-center">
      <p>&copy; {{ date('Y') }} {{ $name ?? 'Your Name' }}. All rights reserved.</p>
    </div>
  </footer>

  <script>
    // Mobile menu toggle
    document.querySelector('button').addEventListener('click', function() {
      const nav = document.querySelector('nav div:nth-child(2)');
      nav.classList.toggle('hidden');
      nav.classList.toggle('block');
    });

    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  </script>
</body>

</html>