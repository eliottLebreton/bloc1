
document.addEventListener('DOMContentLoaded', () => {
    const taskInput = document.getElementById('taskInput');
    const addTaskBtn = document.getElementById('addTaskBtn');
    const taskList = document.getElementById('taskList');
    const removeCompletedBtn = document.getElementById('removeCompletedBtn');
    const saveBtn = document.getElementById('saveBtn');
    const loadBtn = document.getElementById('loadBtn');
    const loadSelect = document.getElementById('loadSelect');
    const saveNameInput = document.getElementById('saveName');

    function createTaskElement(taskText, isChecked = false) {
        const li = document.createElement('li');
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.checked = isChecked;
        checkbox.addEventListener('change', saveTaskList);

        const taskLabel = document.createElement('span');
        taskLabel.innerText = taskText;
        taskLabel.contentEditable = true; // permet la modification de la tâche
        taskLabel.addEventListener('input', saveTaskList);

        const deleteBtn = document.createElement('button');
        deleteBtn.innerText = '🗑';
        deleteBtn.addEventListener('click', () => {
            li.remove();
            saveTaskList();
        });

        li.appendChild(checkbox);
        li.appendChild(taskLabel);
        li.appendChild(deleteBtn);
        taskList.appendChild(li);
    }

    function saveTaskList() {
        const tasks = [];
        taskList.querySelectorAll('li').forEach(li => {
            const taskText = li.querySelector('span').innerText;
            const isChecked = li.querySelector('input').checked;
            tasks.push({ text: taskText, completed: isChecked });
        });
        localStorage.setItem('tasks', JSON.stringify(tasks));
    }

    function loadTaskList() {
        const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
        taskList.innerHTML = ''; // vide la liste actuelle
        tasks.forEach(task => {
            createTaskElement(task.text, task.completed);
        });
    }

    addTaskBtn.addEventListener('click', () => {
        const taskText = taskInput.value.trim();
        if (taskText !== '') {
            createTaskElement(taskText);
            saveTaskList();
            taskInput.value = '';
        }
    });

    removeCompletedBtn.addEventListener('click', () => {
        taskList.querySelectorAll('li').forEach(li => {
            if (li.querySelector('input').checked) {
                li.remove();
            }
        });
        saveTaskList();
    });

    saveBtn.addEventListener('click', () => {
        const saveName = saveNameInput.value.trim();
        if (saveName !== '') {
            const tasks = localStorage.getItem('tasks');
            localStorage.setItem(saveName, tasks);
            updateLoadSelect();
        }
    });

    loadBtn.addEventListener('click', () => {
        const selectedSave = loadSelect.value;
        if (selectedSave !== '') {
            const savedTasks = localStorage.getItem(selectedSave);
            if (savedTasks) {
                localStorage.setItem('tasks', savedTasks);
                loadTaskList();
            }
        }
    });

    function updateLoadSelect() {
        loadSelect.innerHTML = '<option value="">Charger une sauvegarde</option>';
        for (let i = 0; i < localStorage.length; i++) {
            const key = localStorage.key(i);
            if (key !== 'tasks') {
                const option = document.createElement('option');
                option.value = key;
                option.innerText = key;
                loadSelect.appendChild(option);
            }
        }
    }

    updateLoadSelect();
    loadTaskList();
});
