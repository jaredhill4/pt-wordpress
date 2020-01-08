export function cssTimeToMilliseconds(timeString) {
  const num = parseFloat(timeString, 10);
  let unit = timeString.match(/m?s/);
  let milliseconds;

  if (unit) {
    unit = unit[0];
  }

  switch (unit) {
    case 's': // seconds
      milliseconds = num * 1000;
      break;
    case 'ms': // milliseconds
      milliseconds = num;
      break;
    default:
      milliseconds = 0;
      break;
  }

  return milliseconds;
}
