document.addEventListener("DOMContentLoaded", function () {
    const calendarGrid = document.getElementById("calendarGrid");
    const currentMonthYear = document.getElementById("currentMonthYear");
    const prevMonthBtn = document.getElementById("prevMonth");
    const nextMonthBtn = document.getElementById("nextMonth");
    const todayBtn = document.getElementById("todayBtn");
    const eventFilter = document.getElementById("eventFilter");

    // Modal elements
    const modal = document.getElementById("eventModal");
    const modalTitle = document.getElementById("modalTitle");
    const closeModal = document.querySelector(".close-modal");
    const closeModalBtn = document.querySelector(".close-modal-btn");
    const eventForm = document.getElementById("eventForm");
    const eventIdInput = document.getElementById("eventId");
    const eventTitleInput = document.getElementById("eventTitle");
    const eventDescInput = document.getElementById("eventDesc");
    const eventStartInput = document.getElementById("eventStart");
    const eventEndInput = document.getElementById("eventEnd");
    const colorOptions = document.querySelectorAll(".color-option");
    const colorInput = document.getElementById("eventColor");
    const deleteEventBtn = document.getElementById("deleteEventBtn");

    let currentDate = new Date();
    let events = [];
    let currentFilter = "all";

    // Fetch events from server
    function fetchEvents() {
        fetch("/calendario/events")
            .then((response) => response.json())
            .then((data) => {
                events = data;
                renderCalendar();
            })
            .catch((error) => console.error("Error fetching events:", error));
    }

    function renderCalendar() {
        calendarGrid.innerHTML = "";

        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        // Update header
        const monthNames = [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
        ];
        currentMonthYear.textContent = `${monthNames[month]} ${year}`;

        // Get first day of month and days in month
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        // Previous month days
        const prevMonthDays = new Date(year, month, 0).getDate();
        for (let i = firstDay - 1; i >= 0; i--) {
            const dayDiv = createDayElement(prevMonthDays - i, "other-month");
            calendarGrid.appendChild(dayDiv);
        }

        // Current month days
        const today = new Date();
        for (let i = 1; i <= daysInMonth; i++) {
            const isToday =
                i === today.getDate() &&
                month === today.getMonth() &&
                year === today.getFullYear();
            const dayDiv = createDayElement(i, isToday ? "today" : "");

            // Add click event to open modal for new event
            dayDiv.addEventListener("click", (e) => {
                if (
                    e.target === dayDiv ||
                    e.target.classList.contains("day-number")
                ) {
                    openModal(new Date(year, month, i));
                }
            });

            // Render events for this day
            const dayEvents = events.filter((event) => {
                const eventDate = new Date(event.fecha_inicio);
                const matchesDate =
                    eventDate.getDate() === i &&
                    eventDate.getMonth() === month &&
                    eventDate.getFullYear() === year;
                const matchesFilter =
                    currentFilter === "all" || event.color === currentFilter;
                return matchesDate && matchesFilter;
            });

            dayEvents.forEach((event) => {
                const eventPill = document.createElement("div");
                eventPill.className = "event-pill";
                eventPill.style.backgroundColor = event.color;
                eventPill.textContent = event.titulo;
                eventPill.title = event.titulo;

                // Edit event on click
                eventPill.addEventListener("click", (e) => {
                    e.stopPropagation();
                    openEditModal(event);
                });

                dayDiv.appendChild(eventPill);
            });

            calendarGrid.appendChild(dayDiv);
        }

        // Next month days to fill grid
        const totalCells = calendarGrid.children.length;
        const remainingCells = 42 - totalCells; // 6 rows * 7 days
        for (let i = 1; i <= remainingCells; i++) {
            const dayDiv = createDayElement(i, "other-month");
            calendarGrid.appendChild(dayDiv);
        }
    }

    function createDayElement(day, className) {
        const div = document.createElement("div");
        div.className = `calendar-day ${className}`;
        div.innerHTML = `<div class="day-number">${day}</div>`;
        return div;
    }

    // Modal Logic
    function openModal(date) {
        modalTitle.textContent = "Nuevo Evento";
        eventIdInput.value = "";
        deleteEventBtn.style.display = "none";
        eventForm.reset();

        // Set default color
        selectColor("#5d5fef");

        // Format date for datetime-local input (YYYY-MM-DDTHH:mm)
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, "0");
        const day = String(date.getDate()).padStart(2, "0");
        const hours = String(new Date().getHours()).padStart(2, "0");
        const minutes = String(new Date().getMinutes()).padStart(2, "0");

        const dateString = `${year}-${month}-${day}T${hours}:${minutes}`;
        eventStartInput.value = dateString;
        eventEndInput.value = dateString;

        modal.classList.add("show");
    }

    function openEditModal(event) {
        modalTitle.textContent = "Editar Evento";
        eventIdInput.value = event.id;
        eventTitleInput.value = event.titulo;
        eventDescInput.value = event.descripcion || "";
        eventStartInput.value = event.fecha_inicio.substring(0, 16); // Format YYYY-MM-DDTHH:mm
        eventEndInput.value = event.fecha_fin
            ? event.fecha_fin.substring(0, 16)
            : "";

        selectColor(event.color);

        deleteEventBtn.style.display = "block";
        deleteEventBtn.onclick = () => deleteEvent(event.id);

        modal.classList.add("show");
    }

    function selectColor(color) {
        colorOptions.forEach((opt) => opt.classList.remove("selected"));
        const selectedOption = Array.from(colorOptions).find(
            (opt) => opt.dataset.color === color
        );
        if (selectedOption) {
            selectedOption.classList.add("selected");
        }
        colorInput.value = color;
    }

    function closeModalFunc() {
        modal.classList.remove("show");
        eventForm.reset();
    }

    closeModal.addEventListener("click", closeModalFunc);
    closeModalBtn.addEventListener("click", closeModalFunc);
    window.addEventListener("click", (e) => {
        if (e.target === modal) closeModalFunc();
    });

    // Color Picker
    colorOptions.forEach((option) => {
        option.addEventListener("click", () => {
            colorOptions.forEach((opt) => opt.classList.remove("selected"));
            option.classList.add("selected");
            colorInput.value = option.dataset.color;
        });
    });

    // Navigation
    prevMonthBtn.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    nextMonthBtn.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

    todayBtn.addEventListener("click", () => {
        currentDate = new Date();
        renderCalendar();
    });

    // Filter
    eventFilter.addEventListener("change", (e) => {
        currentFilter = e.target.value;
        renderCalendar();
    });

    // Submit Event (Create or Update)
    eventForm.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(eventForm);
        const data = Object.fromEntries(formData.entries());
        const id = eventIdInput.value;

        const url = id ? `/calendario/update/${id}` : "/calendario/store";
        const method = id ? "PUT" : "POST";

        // For PUT/PATCH we need to send JSON, but fetch body with FormData is multipart/form-data
        // Laravel handles JSON better for API-like calls

        fetch(url, {
            method: method,
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                    .value,
            },
            body: JSON.stringify(data),
        })
            .then((response) => response.json())
            .then((savedEvent) => {
                if (id) {
                    // Update existing event in array
                    const index = events.findIndex((e) => e.id == id);
                    if (index !== -1) events[index] = savedEvent;
                } else {
                    // Add new event
                    events.push(savedEvent);
                }
                renderCalendar();
                closeModalFunc();
            })
            .catch((error) => console.error("Error saving event:", error));
    });

    function deleteEvent(id) {
        if (!confirm("¿Estás seguro de que deseas eliminar este evento?"))
            return;

        fetch(`/calendario/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                    .value,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    events = events.filter((e) => e.id != id);
                    renderCalendar();
                    closeModalFunc();
                }
            })
            .catch((error) => console.error("Error deleting event:", error));
    }

    // Initial load
    fetchEvents();
});
