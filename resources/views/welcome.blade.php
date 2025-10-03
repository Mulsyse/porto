<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rafi Dzaki Ananta - Porto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#8b5cf6',
                        dark: '#0f172a',
                        semidark: '#1e293b'
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            cursor: none;
        }
         
        /* For WebKit-based browsers (Chrome, Safari, and Opera) */
        ::-webkit-scrollbar {
            display: none;
        }

        /* For Firefox */
        * {
            scrollbar-width: none;
        }

        /* For Internet Explorer and older Edge */
        * {
            -ms-overflow-style: none;
        }
        
        /* Loading Screen */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #0f172a;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.8s ease-out, visibility 0.8s ease-out;
        }
        
        .loading-screen.hidden {
            opacity: 0;
            visibility: hidden;
        }
        
        .loader {
            width: 60px;
            height: 60px;
            position: relative;
        }
        
        .loader:before, .loader:after {
            content: '';
            position: absolute;
            border: 4px solid #3b82f6;
            opacity: 1;
            border-radius: 50%;
            animation: pulsate 1.5s ease-out infinite;
        }
        
        .loader:after {
            animation-delay: 0.75s;
        }
        
        @keyframes pulsate {
            0% {
                transform: scale(0.1);
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                transform: scale(1.2);
                opacity: 0;
            }
        }
        
        .loading-text {
            margin-top: 20px;
            color: #e2e8f0;
            font-size: 1.2rem;
            letter-spacing: 2px;
        }
        
        /* Custom Cursor */
        .cursor-dot {
            width: 8px;
            height: 8px;
            background-color: #3b82f6;
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
        }
        
        .cursor-outline {
            width: 40px;
            height: 40px;
            border: 2px solid rgba(59, 130, 246, 0.5);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9998;
            transform: translate(-50%, -50%);
            transition: all 0.2s ease;
        }
        
        .cursor-dot.hover, .cursor-outline.hover {
            transform: translate(-50%, -50%) scale(1.5);
            background-color: #ec4899;
            border-color: rgba(236, 72, 153, 0.3);
        }
        
        .cursor-dot.click {
            transform: translate(-50%, -50%) scale(0.8);
            background-color: #10b981;
        }
        
        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Page Entrance Animation */
        .page-content {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease, transform 1s ease;
        }
        
        .page-content.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Card Hover Effects */
        .portfolio-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(59, 130, 246, 0.2);
            overflow: hidden;
        }
        
        .portfolio-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4);
            border-color: rgba(59, 130, 246, 0.5);
        }
        
        .portfolio-card img {
            transition: transform 0.5s ease;
        }
        
        .portfolio-card:hover img {
            transform: scale(1.05);
        }
        
        /* Navigation */
        .nav-link {
            position: relative;
            transition: color 0.3s;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        /* Progress Bar */
        .progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: transparent;
            z-index: 1001; /* Lebih tinggi dari navbar */
            backdrop-filter: blur(8px);
        }
        
        .progress-bar {
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            width: 0%;
        }
        
        /* Navbar */
        nav {
            position: fixed;
            top: 4px; /* Di bawah progress bar */
            left: 0;
            width: 100%;
            z-index: 1000; /* Di bawah progress bar */
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(8px);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.3s ease;
        }
        
        /* Text Animation */
        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes slideInFromRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes slideInFromBottom {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-left {
            animation: slideInFromLeft 1s ease-out forwards;
        }
        
        .animate-right {
            animation: slideInFromRight 1s ease-out forwards;
        }
        
        .animate-bottom {
            animation: slideInFromBottom 1s ease-out forwards;
        }
    </style>
</head>
<body class="bg-dark text-slate-200 overflow-x-hidden">
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loader"></div>
        <div class="loading-text">be patient, bro</div>
    </div>
    
    <!-- Custom Cursor -->
    <div class="cursor-dot"></div>
    <div class="cursor-outline"></div>
    
    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>
    
    <!-- Navigation -->
    <nav>
        <div class="text-2xl font-bold bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text text-transparent animate-left">
            Rafi Dzaki 
        </div>
        
        <div class="hidden md:flex space-x-8">
            <a href="#home" class="nav-link animate-bottom" style="animation-delay: 0.1s;">Home</a>
            <a href="#about" class="nav-link animate-bottom" style="animation-delay: 0.2s;">About</a>
            <a href="#skills" class="nav-link animate-bottom" style="animation-delay: 0.3s;">Experties</a>
            <a href="#portfolio" class="nav-link animate-bottom" style="animation-delay: 0.4s;">Project</a>
            <a href="#contact" class="nav-link animate-bottom" style="animation-delay: 0.5s;">Contact</a>
        </div>
        
        <div class="md:hidden text-xl animate-bottom" style="animation-delay: 0.6s;">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
    
    <!-- Page Content -->
    <div class="page-content" id="pageContent" style="padding-top: 80px;"> <!-- Memberi ruang untuk navbar fixed -->
        <!-- Hero Section -->
        <section id="home" class="min-h-screen flex items-center pt-20 pb-16 px-4 md:px-16">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center" >
                <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <div class="text-lg text-blue-400 font-medium mb-2">Hello everyone,I'm</div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-4">Rafi Dzaki Ananta</h1>
                    <div class="text-xl md:text-2xl mb-6 text-slate-300">
                        I'am a <span class="text-blue-400 font-medium" id="typing-text"></span>
                    </div>
                    <p class="text-slate-400 mb-8 max-w-lg">
                        I create creative digital solutions that combine engaging design with top-notch functionality for optimal user experience.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#portfolio" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg font-medium transition-all duration-300 transform hover:-translate-y-1 animate-bottom" style="animation-delay: 0.3s;">
                            My Project
                        </a>
                        <a href="#contact" class="px-6 py-3 border border-blue-500 text-blue-400 hover:bg-blue-500/10 rounded-lg font-medium transition-all duration-300 animate-bottom" style="animation-delay: 0.4s;">
                            My contact
                        </a>
                    </div>
                </div>
                
                <div class="fade-in flex justify-center animate-right">
                    <div class="relative w-64 h-64 md:w-80 md:h-80">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full animate-float"></div>
                        <div class="absolute inset-4 bg-slate-800 rounded-full overflow-hidden">
                            <img src="https://limbuscompany.wiki.gg/images/Seven_Assoc._South_Section_4_Faust_Full.png?71a402" 
                                 alt="Rafi Dzaki Ananta" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-2 -left-2 w-24 h-24 bg-blue-600/30 rounded-xl blur-xl"></div>
                        <div class="absolute -top-2 -right-2 w-24 h-24 bg-purple-600/30 rounded-xl blur-xl"></div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- About Section -->
        <section id="about" class="py-16 px-4 md:px-16">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center " data-aos="flip-down">About <span class="text-blue-400">Me</span></h2>
                
                <div class="bg-semidark p-8 md:p-12 rounded-xl border border-slate-700/50 "data-aos="fade-up">
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        <div>
                            <h3 class="text-2xl font-bold mb-4">Short Story</h3>
                            <p class="text-slate-300 mb-6">
                               I am a developer and designer with a passion for creating engaging and functional digital experiences.With expertise in a variety of technologies, I am able to develop solutions from concept to implementation.
                            </p>
                            <p class="text-slate-300 mb-6">
                                I'm passionate about the latest technological developments and always eager to learn new things in the world of web development, mobile, IoT, and design.
                            </p>
                            <div class="flex space-x-4">
                                <div class="flex items-center text-blue-400">
                                    <i class="fas fa-graduation-cap mr-2"></i>
                                    <span>RPL</span>
                                </div>
                                <div class="flex items-center text-blue-400">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    <span>Indonesian</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-slate-800 p-4 rounded-lg text-center">
                                <div class="text-4xl font-bold text-blue-400 mb-2">?</div>
                                <div class="text-slate-400">Project Completed</div>
                            </div>
                            <div class="bg-slate-800 p-4 rounded-lg text-center">
                                <div class="text-4xl font-bold text-blue-400 mb-2">?</div>
                                <div class="text-slate-400">Years of Experience</div>
                            </div>
                            <div class="bg-slate-800 p-4 rounded-lg text-center">
                                <div class="text-4xl font-bold text-blue-400 mb-2">?</div>
                                <div class="text-slate-400">Satisfied Client</div>
                            </div>
                            <div class="bg-slate-800 p-4 rounded-lg text-center">
                                <div class="text-4xl font-bold text-blue-400 mb-2">?</div>
                                <div class="text-slate-400">Award</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Skills Section -->
        <section id="skills" class="py-16 px-4 md:px-16">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center"  data-aos="flip-up">My <span class="text-blue-400">Expertise</span></h2>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Technical Skills -->
                    <div class="bg-semidark p-8 rounded-xl border border-slate-700/50 " data-aos="zoom-out-right">
                        <h3 class="text-2xl font-bold mb-6 text-blue-400">Technical</h3>
                        
                        <div class="space-y-6">
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>HTML/CSS/JS</span>
                                    <span>?%</span>
                                </div>
                                <div class="w-full bg-slate-700 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 95%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>PHP</span>
                                    <span>?%</span>
                                </div>
                                <div class="w-full bg-slate-700 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 90%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>Flutter</span>
                                    <span>?%</span>
                                </div>
                                <div class="w-full bg-slate-700 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>IoT</span>
                                    <span>?%</span>
                                </div>
                                <div class="w-full bg-slate-700 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Design Skills -->
                    <div class="bg-semidark p-8 rounded-xl border border-slate-700/50 "data-aos="zoom-out-left">
                        <h3 class="text-2xl font-bold mb-6 text-blue-400">Design</h3>
                        
                        <div class="space-y-6">
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>UI/UX Design</span>
                                    <span>?%</span>
                                </div>
                                <div class="w-full bg-slate-700 rounded-full h-2.5">
                                    <div class="bg-purple-600 h-2.5 rounded-full" style="width: 90%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>Figma</span>
                                    <span>?%</span>
                                </div>
                                <div class="w-full bg-slate-700 rounded-full h-2.5">
                                    <div class="bg-purple-600 h-2.5 rounded-full" style="width: 95%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>Canva</span>
                                    <span>?%</span>
                                </div>
                                <div class="w-full bg-slate-700 rounded-full h-2.5">
                                    <div class="bg-purple-600 h-2.5 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span>Poster Design</span>
                                    <span>?%</span>
                                </div>
                                <div class="w-full bg-slate-700 rounded-full h-2.5">
                                    <div class="bg-purple-600 h-2.5 rounded-full" style="width: 88%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Portfolio Section -->
 <section id="portfolio" class="py-16 px-4 md:px-16">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center " data-aos="flip-right">My <span class="text-blue-400">Project</span></h2>
            
            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-12 "data-aos="zoom-in">
                <button class="px-4 py-2 bg-blue-600 rounded-lg filter-btn active" data-filter="all">Semua</button>
                <button class="px-4 py-2 bg-slate-700 hover:bg-slate-600 rounded-lg filter-btn" data-filter="web">Web Development</button>
                <button class="px-4 py-2 bg-slate-700 hover:bg-slate-600 rounded-lg filter-btn" data-filter="mobile">Mobile Apps</button>
                <button class="px-4 py-2 bg-slate-700 hover:bg-slate-600 rounded-lg filter-btn" data-filter="iot">IoT</button>
                <button class="px-4 py-2 bg-slate-700 hover:bg-slate-600 rounded-lg filter-btn" data-filter="design">UI/UX & Desain</button>
            </div>
            
            <!-- Portfolio Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Web Development Projects -->
                <div class="portfolio-card bg-semidark rounded-xl overflow-hidden" data-category="web" data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <a href="#" class="portfolio-link">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" 
                                 alt="Web Project" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold mb-2">E-commerce Website</h3>
                            <p class="text-slate-400 mb-4">Website e-commerce lengkap dengan PHP dan MySQL</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-blue-600/20 text-blue-400 rounded text-sm">HTML</span>
                                <span class="px-2 py-1 bg-blue-600/20 text-blue-400 rounded text-sm">CSS</span>
                                <span class="px-2 py-1 bg-blue-600/20 text-blue-400 rounded text-sm">JS</span>
                                <span class="px-2 py-1 bg-blue-600/20 text-blue-400 rounded text-sm">PHP</span>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="portfolio-card bg-semidark rounded-xl overflow-hidden" data-category="web"  data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <a href="#" class="portfolio-link">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1115&q=80" 
                                 alt="Web Project" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold mb-2">Dashboard Analytics</h3>
                            <p class="text-slate-400 mb-4">Dashboard analitik dengan visualisasi data interaktif</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-blue-600/20 text-blue-400 rounded text-sm">React</span>
                                <span class="px-2 py-1 bg-blue-600/20 text-blue-400 rounded text-sm">Tailwind</span>
                                <span class="px-2 py-1 bg-blue-600/20 text-blue-400 rounded text-sm">Chart.js</span>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Mobile Apps -->
                <div class="portfolio-card bg-semidark rounded-xl overflow-hidden" data-category="mobile" data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <a href="#" class="portfolio-link">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1581276879432-15e50529f34b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                                 alt="Mobile Project" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold mb-2">Aplikasi Task Management</h3>
                            <p class="text-slate-400 mb-4">Aplikasi manajemen tugas dengan fitur kolaborasi tim</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-green-600/20 text-green-400 rounded text-sm">Flutter</span>
                                <span class="px-2 py-1 bg-green-600/20 text-green-400 rounded text-sm">Dart</span>
                                <span class="px-2 py-1 bg-green-600/20 text-green-400 rounded text-sm">Firebase</span>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="portfolio-card bg-semidark rounded-xl overflow-hidden" data-category="mobile"  data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <a href="#" class="portfolio-link">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" 
                                 alt="Mobile Project" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold mb-2">Aplikasi E-commerce</h3>
                            <p class="text-slate-400 mb-4">Aplikasi mobile untuk platform e-commerce</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-green-600/20 text-green-400 rounded text-sm">Flutter</span>
                                <span class="px-2 py-1 bg-green-600/20 text-green-400 rounded text-sm">API</span>
                                <span class="px-2 py-1 bg-green-600/20 text-green-400 rounded text-sm">Provider</span>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- IoT Projects -->
                <div class="portfolio-card bg-semidark rounded-xl overflow-hidden" data-category="iot" data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <a href="#" class="portfolio-link">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1121&q=80" 
                                 alt="IoT Project" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold mb-2">Smart Home System</h3>
                            <p class="text-slate-400 mb-4">Sistem kontrol rumah pintar berbasis IoT</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-yellow-600/20 text-yellow-400 rounded text-sm">Arduino</span>
                                <span class="px-2 py-1 bg-yellow-600/20 text-yellow-400 rounded text-sm">ESP32</span>
                                <span class="px-2 py-1 bg-yellow-600/20 text-yellow-400 rounded text-sm">Node.js</span>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="portfolio-card bg-semidark rounded-xl overflow-hidden" data-category="iot" data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <a href="#" class="portfolio-link">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" 
                                 alt="IoT Project" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold mb-2">Weather Monitoring Station</h3>
                            <p class="text-slate-400 mb-4">Alat monitoring cuaca dengan data real-time</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-yellow-600/20 text-yellow-400 rounded text-sm">Raspberry Pi</span>
                                <span class="px-2 py-1 bg-yellow-600/20 text-yellow-400 rounded text-sm">Python</span>
                                <span class="px-2 py-1 bg-yellow-600/20 text-yellow-400 rounded text-sm">Sensors</span>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- UI/UX Design -->
                <div class="portfolio-card bg-semidark rounded-xl overflow-hidden" data-category="design" data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <a href="#" class="portfolio-link">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" 
                                alt="Design Project" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold mb-2">Redesign Aplikasi Banking</h3>
                            <p class="text-slate-400 mb-4">UI/UX redesign untuk aplikasi mobile banking</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-purple-600/20 text-purple-400 rounded text-sm">Figma</span>
                                <span class="px-2 py-1 bg-purple-600/20 text-purple-400 rounded text-sm">UI Design</span>
                                <span class="px-2 py-1 bg-purple-600/20 text-purple-400 rounded text-sm">UX Research</span>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="portfolio-card bg-semidark rounded-xl overflow-hidden" data-category="design" data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <a href="#" class="portfolio-link">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                                 alt="Design Project" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold mb-2">Poster Campaign Lingkungan</h3>
                            <p class="text-slate-400 mb-4">Desain poster untuk kampanye lingkungan hidup</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-purple-600/20 text-purple-400 rounded text-sm">Canva</span>
                                <span class="px-2 py-1 bg-purple-600/20 text-purple-400 rounded text-sm">Poster Design</span>
                                <span class="px-2 py-1 bg-purple-600/20 text-purple-400 rounded text-sm">Illustration</span>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="portfolio-card bg-semidark rounded-xl overflow-hidden" data-category="design" data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <a href="#" class="portfolio-link">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1160&q=80" 
                                 alt="Design Project" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold mb-2">Brand Identity Startup</h3>
                            <p class="text-slate-400 mb-4">Membuat identitas merek untuk startup teknologi</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-purple-600/20 text-purple-400 rounded text-sm">Logo Design</span>
                                <span class="px-2 py-1 bg-purple-600/20 text-purple-400 rounded text-sm">Branding</span>
                                <span class="px-2 py-1 bg-purple-600/20 text-purple-400 rounded text-sm">Canva</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
        
        <!-- Contact Section -->
        <section id="contact" class="py-16 px-4 md:px-16">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center " data-aos="flip-left">Contact <span class="text-blue-400">Me</span></h2>
                
                <div class="grid md:grid-cols-2 gap-12">
                    <div data-aos="fade-right"data-aos-offset="400"data-aos-easing="ease-in-sine">
                        <h3 class="text-2xl font-bold mb-6">Let's Chat</h3>
                        <p class="text-slate-300 mb-8">
                            Interested in collaborating or have any questions? Feel free to contact me through this form or through my social media.
                        </p>
                        
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center mr-4">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <div class="font-medium">Gmail</div>
                                    <div class="text-slate-400">rafidzakiananta135@gmail.com</div>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center mr-4">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <div class="font-medium">Telephone</div>
                                    <div class="text-slate-400">+62 838 2225 5786</div>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center mr-4">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <div class="font-medium">Location</div>
                                    <div class="text-slate-400">Indonesian</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex space-x-4 mt-8">
                            <a href="https://github.com/Mulsyse" class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center hover:bg-blue-600 transition-colors">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/rafi-dzaki-ananta-854105361/" class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center hover:bg-blue-600 transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://discord.gg/gqKEVk2r" class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center hover:bg-blue-600 transition-colors">
                                <i class="fa-brands fa-discord"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=+6283822255786nomor&text=halo%20kak%20%F0%9F%91%8B%20aku%20penasaran%20tentang%20kaka" class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center hover:bg-blue-600 transition-colors">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div data-aos="fade-left" data-aos-offset="400" data-aos-easing="ease-in-sine">
                        <form class="bg-semidark p-8 rounded-xl border border-slate-700/50">
                            <div class="mb-6">
                                <label for="name" class="block mb-2 font-medium">Name</label>
                                <input type="text" id="name" class="w-full px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            
                            <div class="mb-6">
                                <label for="email" class="block mb-2 font-medium">Email Address</label>
                                <input type="email" id="email" class="w-full px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            
                            <div class="mb-6">
                                <label for="message" class="block mb-2 font-medium">Message</label>
                                <textarea id="message" rows="5" class="w-full px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                            </div>
                            
                            <button type="submit" class="w-full px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg font-medium transition-colors">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Footer -->
        <footer class="bg-slate-900 py-8 text-center" >
            <div class="max-w-6xl mx-auto px-4" >
                <div class="text-slate-400">
                    &copy; 2025 Rafi Dzaki Ananta. All rights reserved.
                </div>
            </div>
        </footer>
    </div>
    
    <script>
        
        // Loading screen animation
        window.addEventListener('load', function() {
            setTimeout(function() {
                const loadingScreen = document.getElementById('loadingScreen');
                const pageContent = document.getElementById('pageContent');
                
                loadingScreen.classList.add('hidden');
                pageContent.classList.add('visible');
                
                // Initialize other animations after page loads
                initAnimations();
            }, 2000); // Adjust the delay as needed
        });
        
        function initAnimations() {
            // Custom cursor
            const cursorDot = document.querySelector('.cursor-dot');
            const cursorOutline = document.querySelector('.cursor-outline');
            
            document.addEventListener('mousemove', (e) => {
                const posX = e.clientX;
                const posY = e.clientY;
                
                cursorDot.style.left = `${posX}px`;
                cursorDot.style.top = `${posY}px`;
                
                cursorOutline.style.left = `${posX}px`;
                cursorOutline.style.top = `${posY}px`;
            });
            
            // Hover effect for cursor
            const hoverElements = document.querySelectorAll('a, button, .portfolio-card, input, textarea');
            
            hoverElements.forEach(element => {
                element.addEventListener('mouseenter', () => {
                    cursorDot.classList.add('hover');
                    cursorOutline.classList.add('hover');
                });
                
                element.addEventListener('mouseleave', () => {
                    cursorDot.classList.remove('hover');
                    cursorOutline.classList.remove('hover');
                });
                
                element.addEventListener('click', () => {
                    cursorDot.classList.add('click');
                    setTimeout(() => {
                        cursorDot.classList.remove('click');
                    }, 500);
                });
            });
            
            // Scroll progress bar
            window.onscroll = function() {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (winScroll / height) * 100;
                document.getElementById("progressBar").style.width = scrolled + "%";
            };
            
            // Typing effect
            const typingText = document.getElementById('typing-text');
            const texts = ['Web Developer', 'Mobile Developer', 'UI/UX Designer','AI enthusiast','IOT enthusiast'];
            let textIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            let typingSpeed = 100;
            
            function type() {
                const currentText = texts[textIndex];
                
                if (isDeleting) {
                    typingText.textContent = currentText.substring(0, charIndex - 1);
                    charIndex--;
                    typingSpeed = 50;
                } else {
                    typingText.textContent = currentText.substring(0, charIndex + 1);
                    charIndex++;
                    typingSpeed = 100;
                }
                
                if (!isDeleting && charIndex === currentText.length) {
                    isDeleting = true;
                    typingSpeed = 1000;
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    textIndex = (textIndex + 1) % texts.length;
                    typingSpeed = 500;
                }
                
                setTimeout(type, typingSpeed);
            }
            
            // Start typing effect
            type();
            
            // Scroll animation
            const fadeElements = document.querySelectorAll('.fade-in');
            
            function checkFade() {
                fadeElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementBottom = element.getBoundingClientRect().bottom;
                    const isVisible = (elementTop < window.innerHeight - 100) && (elementBottom > 0);
                    
                    if (isVisible) {
                        element.classList.add('visible');
                    }
                });
            }
            
            // Check on scroll
            window.addEventListener('scroll', checkFade);
            
            // Portfolio filtering
            const filterButtons = document.querySelectorAll('.filter-btn');
            const portfolioItems = document.querySelectorAll('.portfolio-card');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active', 'bg-blue-600'));
                    filterButtons.forEach(btn => btn.classList.add('bg-slate-700'));
                    
                    // Add active class to clicked button
                    button.classList.add('active', 'bg-blue-600');
                    button.classList.remove('bg-slate-700');
                    
                    const filter = button.getAttribute('data-filter');
                    
                    portfolioItems.forEach(item => {
                        if (filter === 'all' || item.getAttribute('data-category') === filter) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        }
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>