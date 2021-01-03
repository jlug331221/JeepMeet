import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

export function convertToRelativeTime(dateTime) {
  return dayjs().to(dayjs(dateTime));
}