# Foundation 6 wordpress theme / fp6
by Veerendra Tikhe @veeroo18

This is the basic starter project, It includes a Sass compiler and a starter php files for you.

## Installation

To use this template, your computer needs:

- [NodeJS](https://nodejs.org/en/) (0.10 or greater)
- [Git](https://git-scm.com/)
- local / web wordpress installation
- 
This template can be installed with the Foundation CLI, or downloaded and set up manually.

### Using the CLI

Install the Foundation CLI with this command:

```bash
npm install foundation-cli --global
```

Use this command to set up a blank Foundation for Sites project with this template:

```bash
foundation new --framework sites --template basic
```

The CLI will prompt you to give your project a name. The template will be downloaded into a folder with this name.

### Manual Setup

To manually set up the template, first download it with Git:

```bash
git clone https://github.com/zurb/foundation-sites-template projectname
```

Then open the folder in your command line, and install the needed dependencies:

```bash
cd projectname
npm install
bower install
```

Finally, run `npm start` to run the Sass compiler. It will re-run every time you save a Sass file.
