import { SharedData } from '@/types';
import { usePage } from '@inertiajs/react';

interface AppShellProps {
    children: React.ReactNode;
    variant?: 'header' | 'sidebar';
}

export function AppShell({ children, variant = 'header' }: AppShellProps) {
    const isOpen = usePage<SharedData>().props.sidebarOpen;

    return <div   className="min-h-screen w-full flex flex-col bg-[url('/images/background/bg.webp')] bg-white bg-no-repeat bg-cover bg-center bg-fixed">{children}</div>;
}
