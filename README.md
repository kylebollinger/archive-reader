<div align="center">
<h1 align="center">
<img src="https://kboll.s3.amazonaws.com/projects/reader/favicon@1x.png" width="100" />
<br>archive-reader</h1>
<h3>A library of ancient and esoteric texts. The live app can be found at <a href="https://archivereader.com">archivereader.com</a></h3>
<h3>Developed with the software and tools below.</h3>

<p align="center">
<img src="https://img.shields.io/badge/JavaScript-F7DF1E.svg?style&logo=JavaScript&logoColor=black" alt="JavaScript" />
<img src="https://img.shields.io/badge/Sass-CC6699.svg?style&logo=Sass&logoColor=white" alt="Sass" />
<img src="https://img.shields.io/badge/Bootstrap-7952B3.svg?style&logo=Bootstrap&logoColor=white" alt="Bootstrap" />
<img src="https://img.shields.io/badge/PHP-777BB4.svg?style&logo=PHP&logoColor=white" alt="PHP" />
<img src="https://img.shields.io/badge/Axios-5A29E4.svg?style&logo=Axios&logoColor=white" alt="Axios" />
<img src="https://img.shields.io/badge/JSON-000000.svg?style&logo=JSON&logoColor=white" alt="JSON" />
<img src="https://img.shields.io/badge/Markdown-000000.svg?style&logo=Markdown&logoColor=white" alt="Markdown" />
</p>
<img src="https://img.shields.io/github/last-commit/kylebollinger/archive-reader?style&color=5D6D7E" alt="git-last-commit" />
<img src="https://img.shields.io/github/commit-activity/m/kylebollinger/archive-reader?style&color=5D6D7E" alt="GitHub commit activity" />
<img src="https://img.shields.io/github/languages/top/kylebollinger/archive-reader?style&color=5D6D7E" alt="GitHub top language" />
</div>

---

## 📖 Table of Contents
- [📖 Table of Contents](#-table-of-contents)
- [📍 Overview](#-overview)
- [📦 Features](#-features)
- [📂 Repository Structure](#-repository-structure)
- [🚀 Getting Started](#-getting-started)
    - [🔧 Installation](#-installation)
    - [🤖 Running archive-reader](#-running-archive-reader)
- [🛣 Roadmap](#-roadmap)
- [🤝 Contributing](#-contributing)
- [📄 License](#-license)
- [👏 Acknowledgments](#-acknowledgments)

---


## 📍 Overview

Developing a mobile-friendly reading solution for an archive of sacred texts, addressing HTML formatting issues, and establishing a structured database for an enhanced user experience. The source code for the backed can be found in this repository: <a href="https://github.com/kylebollinger/archive-reader-backend">https://github.com/kylebollinger/archive-reader-backend</a>

---

## 📦 Features

There app consists of 3 primary pages here:

1. **Index page -** the homepage essentially where we display a portion of the catalog and allow a user to search and/or browse through the archive of texts.
2. **Category page** - Another more refined list of texts within a certain category, topic, or alphabetical letter.
3. **Reader page** - the final page is the actual reader view - the main reason for the project. Here we create a clean, mobile-friendly, easy-to-use presentation of the text with dark-mode as the default for reading.

---


## 📂 Repository Structure (relevant only)

```sh
└── archive-reader/
    ├── Procfile
    ├── README.md
    ├── app/
    │   ├── Http/
    │   ├── Models/
    ├── bootstrap/
    ├── composer.json
    ├── composer.lock
    ├── config/
    ├── database/
    │   ├── migrations/
    ├── package-lock.json
    ├── package.json
    ├── resources/
    │   ├── js/
    │   ├── sass/
    │   └── views/
    ├── routes/
    │   └── web.php
    ├── storage/
    │   ├── app/
    │   ├── framework/
    │   └── logs/
    └── webpack.mix.cjs
```


---


## 🚀 Getting Started

***Dependencies***

Please ensure you have the following dependencies installed on your system:

`- ℹ️ PHP > 8.2`

`- ℹ️ Node/NPM`

`- ℹ️ Composer`

`- ℹ️ Laravel`

### 🔧 Installation

1. Clone the archive-reader repository:
```sh
git clone https://github.com/kylebollinger/archive-reader
```

2. Change to the project directory:
```sh
cd archive-reader
```

3. Install the dependencies:
```sh
composer install
```

### 🤖 Running archive-reader

```sh
php artisan serve
```

---

## 🛣 Roadmap

> - [ ] `ℹ️  Add infinite scrolling to the reader`
> - [ ] `ℹ️  Expand the library with more texts from new sources`
> - [ ] `ℹ️  Use AI (Midjourney, Dalle, etc) to generate book cover art for texts that dont have one`


---

## 🤝 Contributing

Contributions are always welcome! Please follow these steps:
1. Fork the project repository. This creates a copy of the project on your account that you can modify without affecting the original project.
2. Clone the forked repository to your local machine using a Git client like Git or GitHub Desktop.
3. Create a new branch with a descriptive name (e.g., `new-feature-branch` or `bugfix-issue-123`).
```sh
git checkout -b new-feature-branch
```
4. Make changes to the project's codebase.
5. Commit your changes to your local branch with a clear commit message that explains the changes you've made.
```sh
git commit -m 'Implemented new feature.'
```
6. Push your changes to your forked repository on GitHub using the following command
```sh
git push origin new-feature-branch
```
7. Create a new pull request to the original project repository. In the pull request, describe the changes you've made and why they're necessary.
The project maintainers will review your changes and provide feedback or merge them into the main branch.

---
