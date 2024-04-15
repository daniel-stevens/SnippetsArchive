# Vim Cheat Sheet

## Basic Commands
- `:q` - Quit Vim
- `:q!` - Quit without saving
- `:w` - Save changes
- `:wq` or `:x` - Save and quit
- `:e {file}` - Open file for editing

## Navigation
- `h, j, k, l` - Move left, down, up, right (respectively)
- `0` - Move to the beginning of the line
- `^` - Move to the first non-blank character of the line
- `$` - Move to the end of the line
- `gg` - Go to the first line of the document
- `G` - Go to the last line of the document
- `{line_number}G` - Go to the specified line number

## Editing
- `i` - Enter insert mode
- `a` - Enter append mode
- `o` - Open a new line below and enter insert mode
- `O` - Open a new line above and enter insert mode
- `dd` - Delete the current line
- `dw` - Delete the current word
- `u` - Undo the last operation
- `Ctrl + r` - Redo the last undo

## Visual Mode
- `v` - Start visual mode (highlight text)
- `V` - Start visual line mode (highlight lines)
- `Ctrl + v` - Start visual block mode (select columns)

## Searching
- `/pattern` - Search for pattern
- `n` - Move to the next occurrence
- `N` - Move to the previous occurrence
- `:%s/old/new/g` - Replace all occurrences of 'old' with 'new' globally

## Multiple Files
- `:tabnew {file}` - Open a new tab with {file}
- `:tabnext` - Go to the next tab
- `:tabprev` - Go to the previous tab
- `:tabclose` - Close the current tab

## Miscellaneous
- `:help {topic}` - Open help for {topic}
- `:noh` - Remove highlighting of search matches

## Advanced Editing
- `ciw` - Change (replace) entire current word
- `cit` - Change (replace) content inside HTML/XML tag
- `caw` - Change (replace) entire word including surrounding whitespace
- `>>` - Indent line right
- `<<` - Indent line left
- `=` - Auto-indent current line or selected text
- `:sort` - Sort lines

## Macros
- `qa` - Start recording macro in register 'a'
- `q` - Stop recording macro
- `@a` - Execute macro stored in register 'a'
- `@@` - Execute last run macro

## Windows and Splits
- `:split {file}` - Split window horizontally and open {file}
- `:vsplit {file}` - Split window vertically and open {file}
- `Ctrl + w w` - Switch between splits
- `Ctrl + w q` - Quit a split window

## Code Folding
- `zf#j` - Create a fold from the cursor down # lines
- `zf/string` - Create a fold from the cursor to string
- `zo` - Open a fold at the cursor
- `zc` - Close a fold at the cursor
- `za` - Toggle a fold at the cursor
