<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { dashboard } from '@/routes';

type Application = {
    full_name: string;
    hr_status: string;
    created_at: string;
    position: {
        name: string;
        region: {
            name: string;
        };
    };
};

type LatestCandidate = {
    id: number;
    full_name: string;
    hr_status: string;
    created_at: string;
    user: {
        name: string;
        email: string;
    };
    position: {
        name: string;
    };
};

defineProps<{
    hasApplication: boolean;
    application: Application | null;
    summary: Record<string, number>;
    latestCandidates: LatestCandidate[];
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Dashboard',
                href: dashboard(),
            },
        ],
    },
});
</script>

<template>
    <Head title="Dashboard" />

    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
        <div class="grid gap-4 md:grid-cols-3">
            <div class="rounded-xl border bg-card p-5">
                <p class="text-sm text-muted-foreground">Total Pelamar</p>
                <p class="mt-2 text-3xl font-semibold">{{ summary.total }}</p>
            </div>
            <div class="rounded-xl border bg-card p-5">
                <p class="text-sm text-muted-foreground">Sedang Diproses</p>
                <p class="mt-2 text-3xl font-semibold">{{ summary.review + summary.interview }}</p>
            </div>
            <div class="rounded-xl border bg-card p-5">
                <p class="text-sm text-muted-foreground">Diterima</p>
                <p class="mt-2 text-3xl font-semibold">{{ summary.hired }}</p>
            </div>
        </div>

        <div class="grid gap-4 lg:grid-cols-2">
            <section class="rounded-xl border bg-card p-5">
                <h2 class="text-lg font-semibold">Status Lamaran Saya</h2>
                <template v-if="hasApplication && application">
                    <p class="mt-3 text-sm">
                        <span class="font-medium">{{ application.full_name }}</span>
                        melamar sebagai
                        <span class="font-medium">{{ application.position.name }}</span>
                        ({{ application.position.region.name }})
                    </p>
                    <p class="mt-2 text-sm text-muted-foreground">
                        Status: {{ application.hr_status }}
                    </p>
                </template>
                <template v-else>
                    <p class="mt-3 text-sm text-muted-foreground">
                        Anda belum mengirim lamaran.
                    </p>
                    <Button as-child class="mt-4">
                        <a href="/applications/create">Kirim Lamaran</a>
                    </Button>
                </template>
            </section>

            <section class="rounded-xl border bg-card p-5">
                <h2 class="text-lg font-semibold">Pelamar Terbaru</h2>
                <div class="mt-3 space-y-3">
                    <div
                        v-for="candidate in latestCandidates"
                        :key="candidate.id"
                        class="rounded-lg border p-3"
                    >
                        <p class="font-medium">{{ candidate.full_name }}</p>
                        <p class="text-xs text-muted-foreground">
                            {{ candidate.position.name }} - {{ candidate.user.email }}
                        </p>
                        <p class="mt-1 text-xs">Status: {{ candidate.hr_status }}</p>
                    </div>
                    <p v-if="!latestCandidates.length" class="text-sm text-muted-foreground">
                        Belum ada data pelamar.
                    </p>
                </div>
            </section>
        </div>
    </div>
</template>
