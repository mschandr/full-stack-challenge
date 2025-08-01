<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">Job Listings</h1>

        <!-- Filters -->
        <div class="mb-4 flex gap-4">
            <input v-model="filters.location" placeholder="Location" class="border p-2 rounded" />
            <select v-model="filters.work_type" class="border p-2 rounded">
                <option value="">All Types</option>
                <option value="1">Remote</option>
                <option value="2">Hybrid</option>
                <option value="3">On-site</option>
            </select>
            <select v-model="filters.salary_band" class="border p-2 rounded">
                <option value="">Any Salary</option>
                <option value="low">Under $100K</option>
                <option value="mid">$100K–150K</option>
                <option value="high">Above $150K</option>
            </select>
            <button @click="search" class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
        </div>

        <!-- Jobs -->
        <div v-if="jobs.data.length">
            <ul>
                <li v-for="job in jobs.data" :key="job.id" class="border-b py-2">
                    <strong>{{ job.title }}</strong> – {{ job.location }} – {{ formatSalary(job.salary) }}
                </li>
            </ul>

            <!-- Pagination -->
            <div class="mt-4 flex justify-between">
                <button :disabled="!jobs.links.prev" @click="changePage(jobs.meta.current_page - 1)">Prev</button>
                <span>Page {{ jobs.meta.current_page }} of {{ jobs.meta.last_page }}</span>
                <button :disabled="!jobs.links.next" @click="changePage(jobs.meta.current_page + 1)">Next</button>
            </div>
        </div>
        <div v-else>
            <p>No jobs found.</p>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { router, usePage } from '@inertiajs/vue3'

const props = defineProps({
    jobs: Object,
    filters: Object,
})

const filters = ref({
    location: props.filters?.location || '',
    work_type: props.filters?.work_type || '',
    salary_band: props.filters?.salary_band || '',
})

function search() {
    router.get(route('job.index'), filters.value, { preserveState: true })
}

function changePage(page) {
    router.get(route('job.index'), { ...filters.value, page }, { preserveState: true })
}

function formatSalary(salary) {
    return salary ? `$${parseFloat(salary).toLocaleString()}` : '—'
}
</script>
