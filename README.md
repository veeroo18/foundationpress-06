# Foundation 6 wordpress theme / fp6
by Veerendra Tikhe @veerendratikhe

This is the basic starter project, It includes a Sass compiler and a starter php files for you.

## Installation

To use this template, your computer needs:

- [NodeJS](https://nodejs.org/en/) (0.10 or greater)
- [Git](https://git-scm.com/)
- local WordPress installation
- 

### Before Setup
NOTE : You will need foundation cli, npm, node etc. installed on your system before you start here.
This repository uses source and release concept, it keeps all source folders aside and creates / builds release folder at a location you set on your harddrive everytime you execute the command. It copies only changed files to same folder and updates your release theme.

### To manually Setup the theme, 
- locate folder you want to create theme source.
- open git bash in this folder
- download repo from Github in this folder

```bash
git clone https://github.com/veeroo18/foundationpress-06
```
- install the needed dependencies in git bash using following command
```bash
npm install
```
- open gulp.js and set up theme folder path , typically in Driveletter:/wp-installation/wp-content/themes/your-theme
- execute following commands in git bash
```bash
foundation watch
```