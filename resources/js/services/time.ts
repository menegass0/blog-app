/**
 * Formats a given timestamp to a relative time string (e.g., "2 hours ago", "yesterday").
 * @param {string} dateString The date to format.
 */
export function formatTimeAgo(dateString: string): string {
    const date = new Date(dateString);
    const now = new Date();

    const seconds = Math.floor((now.getTime() - date.getTime()) / 1000);

    let interval = seconds / 31536000;
    if (interval > 1) {
        return (date.getDate() + 1) + ' de ' + date.toLocaleString('pt-BR', {month: 'long'}) + ' de ' + date.getFullYear();
    }
    interval = seconds / 2592000;

    if (interval > 1) {
        return (date.getDate() + 1) + ' de ' + date.toLocaleString('pt-BR', {month: 'long'});
    }

    interval = seconds / 86400;
    if (interval > 1) {
        const days = Math.floor(interval);
        if (days === 1) return "ontem";
        // To cover "our day ago" or "a day ago" scenarios
        if (days < 7) return days + "d";
    }
    interval = seconds / 3600;
    if (interval > 1) {
        return Math.floor(interval) + "h";
    }
    interval = seconds / 60;
    if (interval > 1) {
        return Math.floor(interval) + "m";
    }
    return Math.floor(seconds) + " seconds ago";
}
